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
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10);

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
(1, 1, '2015adheesh.juvekar@ves.ac.in', '0192023a7bbd73250516f069df18b500', 0, 'RAIT', 'Ramrao Adik Institute of Technology, Sector 7, Phase I, Pad. Dr. D. Y. Patil Vidyapeeth, Nerul, Navi Mumbai, Maharashtra 400706'),
(2, 2, 'amit.singh@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 0, 'VESIT', 'Vivekanand Education Society''s Institute of Technology, 495/497, Hashu Advani Memorial Complex, Collectors Colony, Chembur, Mumbai, Maharashtra 400074'),
(3, 3, '2015asutosh.padhi@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'VIT', 'Vidyalankar campus,Vidyalankar College Marg, Wadala East, Mumbai, Maharashtra 400037'),
(4, 4, '2015sneha.roundhal@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'MIT', 'Maharashtra Institute of Technology, S.No. 124, Paud Road, Kothrud, Pune, Maharashtra 411038'),
(5, 5, '2015shreya.jangale@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'Pravara', 'Pravara Institute of Medical Sciences, Loni Bk, Tal., Rahata, Maharashtra 423107'),
(6, 6, '2015isha.shetty@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'Bhandarkars'' Arts & Science College', 'Bhandarkars'' Arts & Science College, Kundapura, Udupi, Karnataka 576201'),
(7, 7, '2015dipshi.shetty@ves.ac.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'AITCKM', 'Adichunchanagiri Institute of Technology, KM Road, Chickmagaluru, Karnataka 577102'),
(8, 8, 'ashutosh_padhi1@yahoo.in', '21232f297a57a5a743894a0e4a801fc3', 1, 'NITK', 'National Institute of Technology, Karnataka, NH 66, Srinivas Nagar, Surathkal, Mangaluru, Karnataka 575025'),
(9, 9, 'learnthingby@gmail.com', '22af645d1859cb5ca6da0c484f1f37ea', 0, 'RIT', 'Rajeev Institute of Technology, Plot 1-D, Growth Center, Industrial Area, B-M Bypass Road, Hassan, Karnataka 573201'),
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
(1, 1, NULL, 1, 1, 'Castle Mill', '400601', 'There is so much garbage on the streets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0),
(2, 1, NULL, 2, 1, 'kurla station', '', 'No garbage management, so much garbage on the streets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0),
(3, 1, NULL, 3, 1, 'chembur', '400071', 'Nobody follows the traffic rules, it is dangerous for citizens.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0),
(4, 1, NULL, 4, 2, 'M.G. Road', '', 'There is so much traffic on the road.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat', 1, 0, 0, 0, 0),
(5, 1, NULL, 5, 2, 'Nampur', '', 'We are not getting good drinking water', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0),
(6, 1, NULL, 6, 3, '', '', 'There no playground to play, for our children.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0),
(7, 1, NULL, 7, 3, '', '', 'There is no safe place to ride bicycle in this town.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0),
(8, 1, NULL, 8, 3, '', '', 'There is a group of boys performing bike stunts on the local streets.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0),
(9, 1, NULL, 9, 3, '', '', 'Public transport facilities are very less.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0),
(10, 1, NULL, 10, 3, 'chirampur', '', 'So much noise pollution due to Dhol Tasha practice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat ', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `issuebogusupvote`
--

CREATE TABLE `issuebogusupvote` (
  `inst_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issueduplicateupvote`
--

CREATE TABLE `issueduplicateupvote` (
  `inst_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `similar_to_issue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10);

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
(1, 'Mumbai'),
(2, 'Pune'),
(3, 'Karnataka');

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

-- --------------------------------------------------------

--
-- Table structure for table `solutionlikedetails`
--

CREATE TABLE `solutionlikedetails` (
  `solution_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `mobile_number` varchar(13) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `fname`, `lname`, `mobile_number`, `district_id`) VALUES
(1, '2015adheesh.juvekar@ves.ac.in', 'Adheesh', 'Juvekar', '9829182847', 1),
(2, 'juvekaradheesh@gmail.com', 'Adheesh', 'Juvekar', '', 1),
(3, 'marathimandalee@gmail.com', '', '', NULL, NULL),
(4, 'learnthingsby@gmail.com', 'Learn', 'Things', '9757322862', 1),
(5, 'learnthingsby1@gmail.com', '', '', NULL, NULL);

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
  ADD PRIMARY KEY (`inst_id`,`issue_id`),
  ADD KEY `FOREIGN1` (`inst_id`),
  ADD KEY `FOREIGN2` (`issue_id`);

--
-- Indexes for table `issueduplicateupvote`
--
ALTER TABLE `issueduplicateupvote`
  ADD PRIMARY KEY (`inst_id`,`issue_id`),
  ADD KEY `FOREIGN1` (`inst_id`),
  ADD KEY `FOREIGN2` (`issue_id`),
  ADD KEY `FOREIGN3` (`similar_to_issue`);

--
-- Indexes for table `issueupvote`
--
ALTER TABLE `issueupvote`
  ADD PRIMARY KEY (`user_id`,`issue_id`),
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
  ADD PRIMARY KEY (`solution_id`,`user_id`),
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
