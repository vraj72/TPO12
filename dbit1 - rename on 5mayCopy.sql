-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2016 at 05:18 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbit1`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `stu_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`stu_id`) VALUES
('313amritha3488'),
('313candida3473'),
('a'),
('abcd'),
('far');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(30) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `query` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `company`, `url`, `query`) VALUES
(1, 'ss', 'rclaudia761@gmail.com', 0, '', '', ''),
(2, 'abd', 'candida2295@gmail.com', 0, '', '', ''),
(3, 'abc', 'sd@gmail.com', 0, '', '', 'sjsldgjg.,bmx.c,bmcv,.bmc,cxvb\r\nvlksjgbk,bvm,xvm,fbms\r\nsfkcjxvk,casdf\r\ndsflkbjgfbvnb,mvc nkghjvjbkncvbbubhn ckjn dbfgjuhfgjhfkdgjhfkfndgjkhfkubhgnbfgbjkbnmvddjelf'),
(4, 'TCS', 'dfdfd@gmail.com', 12344, 'cvxbxbxb', 'http://www.dz.com', 'ddv'),
(5, 'z', 'sd@gmail.com', 0, 'zc', 'http://www.dz.com', 'h'),
(6, '', '', 0, '', '', ''),
(7, 'af', 'rclaudia761@gmail.com', 0, 'zXZc', 'http://www.dz.com', 'zxZC');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `title`, `content`, `date`, `branch`) VALUES
(24, 'cap', 'dfk,', '2016-08-05 19:51:11', 'COMPS'),
(25, 'eaf', 'ZXX', '2016-08-05 19:55:09', 'IT'),
(26, 'INfosys', 'zdfl,v/.,vzc', '2016-08-06 06:13:14', 'IT'),
(27, 'xc', 'zdx', '2016-08-09 17:21:51', 'EXTC'),
(28, 'zxc', 'z', '2016-08-09 17:46:30', 'MECH'),
(29, 'asduygjhfn', 'sidfuvkszdjgks', '2016-08-09 18:08:19', 'IT'),
(30, 'aaaa', 'aaaaa', '2016-08-18 10:12:07', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sr_no` int(11) NOT NULL,
  `stu_id` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'allowed'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sr_no`, `stu_id`, `password`, `name`, `branch`, `email`, `status`) VALUES
(1, '313candida3473', 'abcd', 'Candida Rodrigues', 'IT', 'candida2295@gmail.com', 'allowed'),
(2, '313amritha3488', 'aaaa', NULL, 'MECH', NULL, 'allowed'),
(4, '313claw1111', '1111', NULL, 'extc', NULL, 'allowed'),
(5, 'a', 'a', NULL, 'COMPS', NULL, 'allowed'),
(6, 'far', 'far', 'Farheen', 'IT', NULL, 'allowed');

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_info`
--

CREATE TABLE IF NOT EXISTS `student_academic_info` (
  `sr_no` int(3) NOT NULL,
  `stu_id` varchar(30) NOT NULL,
  `X` varchar(10) NOT NULL,
  `Xboard` varchar(10) NOT NULL,
  `XII` varchar(10) NOT NULL,
  `XIIboard` varchar(10) NOT NULL,
  `Dip` varchar(5) NOT NULL,
  `Dipboard` varchar(20) NOT NULL,
  `sem1` varchar(10) NOT NULL,
  `sem2` varchar(10) NOT NULL,
  `sem3` varchar(10) NOT NULL,
  `sem4` varchar(10) NOT NULL,
  `sem5` varchar(10) NOT NULL,
  `sem6` varchar(10) NOT NULL,
  `sem7` varchar(10) NOT NULL,
  `LKTs` varchar(2) NOT NULL,
  `DKTs` varchar(2) NOT NULL,
  `cert` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_academic_info`
--

INSERT INTO `student_academic_info` (`sr_no`, `stu_id`, `X`, `Xboard`, `XII`, `XIIboard`, `Dip`, `Dipboard`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`, `sem7`, `LKTs`, `DKTs`, `cert`) VALUES
(9, '', '90', 'MSBTE', '', '', '79', 'SBMP', '7', '8', '7', '8', '9', '9', '', '', '', ''),
(5, '313amritha3488', '51', 'fdfvfv', '455', 'vcvxv', '333', 'cvsx', '23', '32422', '3', '34', '324', '34', '345', '2', '', ''),
(2, '313candida3473', '34', 'fgv', '345', 'hnh', '45', 'yhgn', '8', '8', '8', '8', '8', '8', '8', '0', '0', 'tgfbv'),
(3, '313claw1111', '45', 'fdf', '56', 'fgf', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', 'thg'),
(4, 'a', '34', 'tgf', '345', 'hg', '6', 'hfh', '8', '8', '8', '8', '8', '8', '8', '8', '8', 'ujhm'),
(11, 'abcd', '79', 'dsds', '89', 'sdsd', '789', 'jhjh', '7', '7', '878', '8', '8', '8', '8', '8', '8', '322'),
(14, 'far', '78', 'sdsds', '78', 'wswdsds', '87', 'ddfd', '7.58', '7.8', '7', '8', '8', '8', '7', '1', '1', '121');

-- --------------------------------------------------------

--
-- Table structure for table `student_applied`
--

CREATE TABLE IF NOT EXISTS `student_applied` (
  `id` int(11) NOT NULL,
  `stu_id` varchar(25) NOT NULL,
  `c_name` varchar(25) NOT NULL,
  `stu_name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `branch` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_applied`
--

INSERT INTO `student_applied` (`id`, `stu_id`, `c_name`, `stu_name`, `email`, `branch`) VALUES
(1, 'a', 'cap', '', '', 'COMPS'),
(2, '313candida3473', 'eaf', 'Candida Rodrigues', 'candida2295@gmail.com', 'IT'),
(3, '313amritha3488', 'zxc', '', '', 'MECH'),
(4, 'a', 'cap', '', '', 'COMPS'),
(5, 'far', 'eaf', 'Farheen', '', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `student_parent_info`
--

CREATE TABLE IF NOT EXISTS `student_parent_info` (
  `sr_no` int(3) NOT NULL,
  `stu_id` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `foccupation` varchar(20) NOT NULL,
  `fmob` varchar(15) NOT NULL,
  `femail` varchar(30) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `moccupation` varchar(20) NOT NULL,
  `mmob` varchar(15) NOT NULL,
  `memail` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_parent_info`
--

INSERT INTO `student_parent_info` (`sr_no`, `stu_id`, `fname`, `foccupation`, `fmob`, `femail`, `mname`, `moccupation`, `mmob`, `memail`) VALUES
(9, '', 'jhjh', 'jhjh', '656565', 'a@a.com', 'mnknk', 'kjkjkj', '5454', 'a@a.com'),
(5, '313amritha3488', 'refw', 'dfsdv', 'dvv', 'vv@dbg.com', 'dvsv', 'dvv', 'dfsfa', 'vfasdv@dcn.com'),
(2, '313candida3473', 'gjh', 'jghm', 'hgvnb', 'cabn@sdjm.com', 'hgnb', 'hgnb', 'jghmn ', 'd@d.com'),
(3, '313claw1111', 'hfhg', 'hgf', 'fhg', 'cabn@sdjm.com', 'tf', 'gf', 'gf', 'dsv@hj.com'),
(4, 'a', 'gfdgb', 'gfdg', 'gfdg', 'cabn@sdjm.com', 'dgf', 'gfd', 'df', 'd@d.com'),
(11, 'abcd', 'ddss', 'sd', '6545', 'a@a.com', 'sds', 'sdsd', '221', 'a@a.com'),
(14, 'far', 'mhjhj', 'hjhjh', '656565', 'a@a.com', 'mnjhj', 'hjhjhjh', '545', 'a@a.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_placement_info`
--

CREATE TABLE IF NOT EXISTS `student_placement_info` (
  `sr_no` int(4) NOT NULL,
  `stu_id` varchar(20) NOT NULL,
  `resume_upload` varchar(3) NOT NULL,
  `grad_year` varchar(4) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dept` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `caste` varchar(10) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `pob` varchar(20) NOT NULL,
  `aadhaar` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pc` varchar(10) NOT NULL,
  `interest` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_placement_info`
--

INSERT INTO `student_placement_info` (`sr_no`, `stu_id`, `resume_upload`, `grad_year`, `fname`, `mname`, `lname`, `dept`, `gender`, `mobile`, `email`, `dob`, `caste`, `religion`, `pob`, `aadhaar`, `address`, `city`, `state`, `pc`, `interest`, `status`) VALUES
(8, '', 'yes', '2016', 'raj', 'bharat', 'shah', 'IT', 'male', '5454', 'a@a.com', '2016-08-02', 'open', 'jhj', 'hjhjhjh', '354', 'khgjhgjhg', 'mnjnjn', 'kjnkjkj', '545454', 'yes', 'unplaced'),
(4, '313amritha3488', 'yes', 'dd', 'dsasd', 'sdd', 'sdad', 'IT', 'female', '233', 'cab@sd.com', '223', 'open', 'dfsdf', 'ddvdsv', 'dvsdv', 'dcc', 'czxc zx', 'dfaf', '4324', 'yes', 'unplaced'),
(1, '313candida3473', 'yes', 'df', 'jg', 'gjh', 'hj', 'IT', 'female', 'yjhmn', 'candida2295@gmail.com', 'jh', 'open', 'hgvn', 'hjnb', 'jhnb ', 'jhmbn', 'jhmn', 'jhm', 'jghn', 'yes', 'unplaced'),
(2, '313claw1111', 'yes', 'eds', 'xcv', 'xc', 'xc', 'IT', 'female', 'xc', 'rclaudia761@gmail.com', 'jh', 'open', 'hfg', 'hgf', 'hg', 'ghf', 'ghf', 'ghf', 'hgf', 'yes', 'unplaced'),
(3, 'a', 'yes', 'sad', 'gfb', 'hg', 'hg', 'IT', 'female', 'hmb', 'amrith@gmail.com', 'gfhb', 'open', 'hg', 'nvb ', 'hgbn', 'ghv ', 'dgfd', 'gfdgbfd', 'gfdbgfd', 'yes', 'unplaced'),
(10, 'abcd', 'yes', '2016', 'hjh', 'hjh', 'h', 'IT', 'male', '656565656', 'a@a.com', '2016-08-04', 'open', 'mnj', 'hjh', 'jhj', 'jh', 'kjhjh', 'jhjhj', '88545', 'yes', 'unplaced'),
(13, 'far', 'yes', '321', 'jbjbjb', 'jkjbjkb', 'jbjbj', 'IT', 'male', '323133', 'a@a.com', '2016-08-01', 'open', 'dssdsds', 'sdfsdsd', '121', 'sdsdsds', 'dsdsds', 'dsdsd', '2321', 'yes', 'unplaced');

-- --------------------------------------------------------

--
-- Table structure for table `stu_details`
--

CREATE TABLE IF NOT EXISTS `stu_details` (
  `id` int(4) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_details`
--

INSERT INTO `stu_details` (`id`, `username`, `email`, `password`) VALUES
(13, '313candida3473', 'candida2295@gmail.com', '9*8BE#bGm'),
(14, '313amritha3488', 'e@f.com', '4cEAVh$!s'),
(16, '313claw1111', 'claw@abc.com', 'HT@FAJ&e5');

-- --------------------------------------------------------

--
-- Table structure for table `tpc`
--

CREATE TABLE IF NOT EXISTS `tpc` (
  `ID` int(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpc`
--

INSERT INTO `tpc` (`ID`, `username`, `password`, `branch`) VALUES
(1, 'tpc', 'tpc', ''),
(3, 'abcd', 'abcd', 'IT'),
(4, 'can', 'can', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sr_no`,`stu_id`);

--
-- Indexes for table `student_academic_info`
--
ALTER TABLE `student_academic_info`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `sr_no` (`sr_no`);

--
-- Indexes for table `student_applied`
--
ALTER TABLE `student_applied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_parent_info`
--
ALTER TABLE `student_parent_info`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `sr_no` (`sr_no`);

--
-- Indexes for table `student_placement_info`
--
ALTER TABLE `student_placement_info`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `sr_no` (`sr_no`);

--
-- Indexes for table `stu_details`
--
ALTER TABLE `stu_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpc`
--
ALTER TABLE `tpc`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student_academic_info`
--
ALTER TABLE `student_academic_info`
  MODIFY `sr_no` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `student_applied`
--
ALTER TABLE `student_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_parent_info`
--
ALTER TABLE `student_parent_info`
  MODIFY `sr_no` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `student_placement_info`
--
ALTER TABLE `student_placement_info`
  MODIFY `sr_no` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `stu_details`
--
ALTER TABLE `stu_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tpc`
--
ALTER TABLE `tpc`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
