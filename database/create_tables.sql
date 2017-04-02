--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `districtsinregion`
--

CREATE TABLE `districtsinregion` (
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `issueupvote`
--

CREATE TABLE `issueupvote` (
  `user_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `issuebogusupvote`
--

CREATE TABLE `issuebogusupvote` (
  `inst_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `issueduplicateupvote`
--

CREATE TABLE `issueduplicateupvote` (
  `inst_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `similar_to_issue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
-- Table structure for table `solutionlikedetails`
--

CREATE TABLE `solutionlikedetails` (
  `solution_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `issue_id` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_desc` text NOT NULL,
  `inst_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `like_count` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `comment_like`
--

CREATE TABLE `comment_like` (
  `comment_id` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `replytocomment`
--

CREATE TABLE `replytocomment` (
  `comment_id` int(11) NOT NULL,
  `reply_desc` text NOT NULL,
  `inst_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `resource_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `resource_desc` text NOT NULL,
  `resource_link` text NOT NULL,
  `likeCount` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `resource_like`
--

CREATE TABLE `resource_like` (
  `resource_id` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD PRIMARY KEY (`issue_id`,`inst_id`),
  ADD KEY `issue_id` (`issue_id`,`inst_id`),
  ADD KEY `fk_inst_id_collaborators` (`inst_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `inst_id` (`inst_id`,`issue_id`),
  ADD KEY `fk_issue_id_comments` (`issue_id`);

--
-- Indexes for table `comment_like`
--
ALTER TABLE `comment_like`
  ADD PRIMARY KEY (`comment_id`,`inst_id`),
  ADD KEY `inst_id` (`inst_id`),
  ADD KEY `comment_id` (`comment_id`);

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
-- Indexes for table `replytocomment`
--
ALTER TABLE `replytocomment`
  ADD KEY `FOREIGN` (`inst_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `FOREIGN1` (`issue_id`),
  ADD KEY `FOREIGN` (`inst_id`);

--
-- Indexes for table `resource_like`
--
ALTER TABLE `resource_like`
  ADD PRIMARY KEY (`resource_id`,`inst_id`),
  ADD KEY `FOREIGN1` (`resource_id`),
  ADD KEY `FOREIGN2` (`inst_id`);

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
-- Constraints for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD CONSTRAINT `fk_inst_id_collaborators` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`),
  ADD CONSTRAINT `fk_issue_id_collaborators` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`issue_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_inst_id_comments` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`),
  ADD CONSTRAINT `fk_issue_id_comments` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`issue_id`);

--
-- Constraints for table `comment_like`
--
ALTER TABLE `comment_like`
  ADD CONSTRAINT `fk_comment_id_comment_like` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`),
  ADD CONSTRAINT `fk_inst_id_comment_like` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`);

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
-- Constraints for table `replytocomment`
--
ALTER TABLE `replytocomment`
  ADD CONSTRAINT `fk_comment_id_replytocomment` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`),
  ADD CONSTRAINT `fk_inst_id_replytocomment` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`);

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `fk_inst_id_resource` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`),
  ADD CONSTRAINT `fk_issue_id_resource` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`issue_id`);

--
-- Constraints for table `resource_like`
--
ALTER TABLE `resource_like`
  ADD CONSTRAINT `fk_inst_id_resource_like` FOREIGN KEY (`inst_id`) REFERENCES `institute` (`inst_id`),
  ADD CONSTRAINT `fk_resource_id_resource_like` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`);

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
