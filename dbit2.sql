-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 09:18 AM
-- Server version: 5.6.23-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbit2`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `stu_id` varchar(30) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`stu_id`) VALUES
('12'),
('25'),
('313amritha3488'),
('313candida3473'),
('315aditya4231'),
('40'),
('a'),
('abcd'),
('daelyn'),
('far'),
('sanika');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(30) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `query` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch` varchar(10) NOT NULL,
  `ten` int(11) NOT NULL,
  `twelve` int(11) NOT NULL,
  `diploma` int(11) NOT NULL,
  `fe` int(11) NOT NULL,
  `se` int(11) NOT NULL,
  `te` int(11) NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `title`, `content`, `date`, `branch`, `ten`, `twelve`, `diploma`, `fe`, `se`, `te`) VALUES
(47, 'atos', 'werwe', '2017-08-11 07:23:48', 'IT', 50, 50, 50, 3, 3, 3),
(48, 'atos', 'werwe', '2017-08-11 07:23:48', 'MECH', 50, 50, 50, 3, 3, 3),
(71, 'ddd', 'cxz', '2017-08-11 07:30:55', 'IT', 50, 50, 50, 4, 4, 4),
(72, 'ddd', 'cxz', '2017-08-11 07:30:55', 'COMPS', 50, 50, 50, 4, 4, 4),
(73, 'jio', 'jio', '2017-08-11 10:45:40', 'IT', 50, 50, 50, 5, 5, 5),
(74, 'jio', 'jio', '2017-08-11 10:45:40', 'COMPS', 50, 50, 50, 5, 5, 5),
(75, 'L&T', 'dfgdfgdf', '2017-08-12 09:13:36', 'IT', 50, 50, 50, 5, 5, 5),
(76, 'L&T', 'dfgdfgdf', '2017-08-12 09:13:36', 'COMPS', 50, 50, 50, 5, 5, 5),
(77, 'infosys', 'fddf', '2017-08-12 09:34:14', 'IT', 50, 50, 50, 5, 5, 5),
(78, 'infosys', 'fddf', '2017-08-12 09:34:14', 'COMPS', 50, 50, 50, 5, 5, 5),
(79, 'tcs', 'fd', '2017-08-18 07:54:15', 'IT', 50, 50, 50, 5, 5, 5),
(80, 'tcs', 'fd', '2017-08-18 07:54:15', 'EXTC', 50, 50, 50, 5, 5, 5),
(81, 'aaaaa', 'dfds', '2017-08-28 10:46:53', 'IT', 50, 50, 50, 5, 5, 5),
(82, 'aaaaa', 'dfds', '2017-08-28 10:46:54', 'COMPS', 50, 50, 50, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'allowed',
  `rollno` int(11) NOT NULL,
  PRIMARY KEY (`sr_no`,`stu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sr_no`, `stu_id`, `password`, `name`, `branch`, `email`, `status`, `rollno`) VALUES
(1, '12', '12', '12', 'COMPS', 'bhat.sanika@gmail.com', 'allowed', 38),
(1, '25', '25', 'vaishali', 'COMPS', 'vaishali_sakpal@rediffmail.com', 'allowed', 25),
(1, '26', '26', 'pankhu', 'COMPS', 'vaishali_sakpal@rediffmail.com', 'allowed', 26),
(1, '27', '27', 'vv', 'COMPS', 'vaishali_sakpal@rediffmail.com', 'allowed', 27),
(1, '313candida3473', 'abcd', 'Candida Rodrigues', 'IT', 'candida2295@gmail.com', 'allowed', 0),
(1, '33', '33', '33', 'EXTC', 'bhat.sanika@gmail.com', 'allowed', 33),
(1, '40', '40', '40', 'EXTC', 'bhat.sanika@gmail.com', 'allowed', 40),
(1, '5', '5', 'vvv', 'IT', 'vaishali_sakpal@rediffmail.com', 'allowed', 5),
(1, 'daelyn', 'daelyn', 'daelyn', 'IT', 'dae@gmail.com', 'debarred', 56),
(1, 'sanika', 'sanika', 'sanika', 'EXTC', 'bhat.sanika@gmail.com', 'allowed', 99),
(1, 'vaishali', 'vaishali', 'vaishali', 'IT', 'vaishali_sakpal@rediffmail.com', 'allowed', 25),
(2, '313amritha3488', 'aaaa', NULL, 'MECH', NULL, 'allowed', 0),
(5, 'a', 'a', NULL, 'COMPS', NULL, 'allowed', 0),
(6, 'far', 'far', 'Farheen', 'IT', NULL, 'allowed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_info`
--

CREATE TABLE IF NOT EXISTS `student_academic_info` (
  `sr_no` int(3) NOT NULL AUTO_INCREMENT,
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
  `cert` varchar(30) NOT NULL,
  PRIMARY KEY (`stu_id`),
  UNIQUE KEY `sr_no` (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `student_academic_info`
--

INSERT INTO `student_academic_info` (`sr_no`, `stu_id`, `X`, `Xboard`, `XII`, `XIIboard`, `Dip`, `Dipboard`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`, `sem7`, `LKTs`, `DKTs`, `cert`) VALUES
(22, '25', '75', 'SSC', '75', 'HSC', '', '', '7', '7', '7', '7', '7', '7', '7', '', '', ''),
(5, '313amritha3488', '51', 'fdfvfv', '455', 'vcvxv', '333', 'cvsx', '23', '32422', '3', '34', '324', '34', '345', '2', '', ''),
(2, '313candida3473', '34', 'fgv', '345', 'hnh', '45', 'yhgn', '8', '8', '8', '8', '8', '8', '8', '0', '0', 'tgfbv'),
(3, '313claw1111', '45', 'fdf', '56', 'fgf', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', 'thg'),
(15, '315aditya4231', '89', 'State', '89', 'cbse', '60', '60', '9', '9', '9', '9', '9', '9', '9', '', '', '18923721'),
(4, 'a', '34', 'tgf', '345', 'hg', '6', 'hfh', '8', '8', '8', '8', '8', '8', '8', '8', '8', 'ujhm'),
(11, 'abcd', '79', 'dsds', '89', 'sdsd', '789', 'jhjh', '7', '7', '878', '8', '8', '8', '8', '8', '8', '322'),
(23, 'daelyn', '60', 'ssc', '60', 'HSC', '', '', '6', '6', '6', '6', '6', '6', '6', '0', '0', ''),
(14, 'far', '78', 'sdsds', '78', 'wswdsds', '87', 'ddfd', '7.58', '7.8', '7', '8', '8', '8', '7', '0', '1', '121'),
(16, 'sanika', '77', 'SSC', '77', 'HSC', '', '', '8', '8', '8', '8', '8', '8', '8', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_applied`
--

CREATE TABLE IF NOT EXISTS `student_applied` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(25) NOT NULL,
  `c_name` varchar(25) NOT NULL,
  `stu_name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `branch` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student_applied`
--

INSERT INTO `student_applied` (`id`, `stu_id`, `c_name`, `stu_name`, `email`, `branch`) VALUES
(1, 'a', 'cap', '', '', 'COMPS'),
(2, '313candida3473', 'eaf', 'Candida Rodrigues', 'candida2295@gmail.com', 'IT'),
(3, '313amritha3488', 'zxc', '', '', 'IT'),
(4, 'a', 'cap', '', '', 'COMPS'),
(5, 'far', 'eaf', 'Farheen', '', 'IT'),
(6, 'a', 'cap', '', '', 'COMPS'),
(7, 'far', 'Aggrawal', 'Farheen', '', 'IT'),
(8, 'far', 'FTS', 'Farheen', '', 'IT'),
(9, 'daelyn', 'atos', 'daelyn', 'dae@gmail.com', 'IT'),
(10, '25', 'ddd', 'vaishali', 'vaishali_sakpal@rediffmail.com', 'COMPS'),
(11, '25', 'ddd', 'vaishali', 'vaishali_sakpal@rediffmail.com', 'COMPS'),
(12, '25', 'jio', 'vaishali', 'vaishali_sakpal@rediffmail.com', 'COMPS'),
(13, '25', 'L&T', 'vaishali', 'vaishali_sakpal@rediffmail.com', 'COMPS'),
(14, '25', 'L&T', 'vaishali', 'vaishali_sakpal@rediffmail.com', 'COMPS'),
(15, 'far', 'atos', 'Farheen', '', 'IT'),
(16, 'far', 'tcs', 'Farheen', '', 'IT'),
(17, 'far', 'atos', 'Farheen', '', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `student_parent_info`
--

CREATE TABLE IF NOT EXISTS `student_parent_info` (
  `sr_no` int(3) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `foccupation` varchar(20) NOT NULL,
  `fmob` varchar(15) NOT NULL,
  `femail` varchar(30) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `moccupation` varchar(20) NOT NULL,
  `mmob` varchar(15) NOT NULL,
  `memail` varchar(30) NOT NULL,
  PRIMARY KEY (`stu_id`),
  UNIQUE KEY `sr_no` (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `student_parent_info`
--

INSERT INTO `student_parent_info` (`sr_no`, `stu_id`, `fname`, `foccupation`, `fmob`, `femail`, `mname`, `moccupation`, `mmob`, `memail`) VALUES
(9, '', 'jhjh', 'jhjh', '656565', 'a@a.com', 'mnknk', 'kjkjkj', '5454', 'a@a.com'),
(17, '12', 'fyfy', 'tuhj', '9876543567', 'a@ji.com', 'ugty', 'rtry', '9877678655', 'der@hi.com'),
(22, '25', 'dfdf', 'dfds', '4546465465', 'vaishali@dbit.in', 'fsf', 'dfgd', '9845498745', 'vaishali@dbit.in'),
(5, '313amritha3488', 'refw', 'dfsdv', 'dvv', 'vv@dbg.com', 'dvsv', 'dvv', 'dfsfa', 'vfasdv@dcn.com'),
(2, '313candida3473', 'gjh', 'jghm', 'hgvnb', 'cabn@sdjm.com', 'hgnb', 'hgnb', 'jghmn ', 'd@d.com'),
(3, '313claw1111', 'hfhg', 'hgf', 'fhg', 'cabn@sdjm.com', 'tf', 'gf', 'gf', 'dsv@hj.com'),
(15, '315aditya4231', 'Nitin', 'Goverment', '9821082029', 'nsb6446@rediffmail.com', 'Aarti', 'Bank', '9833572260', 'artibhagwat_811@rediffmail.com'),
(18, '33', 'sunil', 'service', '9833324499', 'vaishali@dbit.in', 'minal', 'service', '5656565656', 'vaishali@dbit.in'),
(21, '40', 'fyfy', 'service', '9876543567', 'vaishali@dbit.in', 'tytyj', 'service', '5656565656', 'dkfndskl@gmail.com'),
(4, 'a', 'gfdgb', 'gfdg', 'gfdg', 'cabn@sdjm.com', 'dgf', 'gfd', 'df', 'd@d.com'),
(11, 'abcd', 'ddss', 'sd', '6545', 'a@a.com', 'sds', 'sdsd', '221', 'a@a.com'),
(23, 'daelyn', 'fyfy', 'service', '9876543567', 'bhat.sanika@gmail.com', 'tytyj', 'rtry', '5656565656', 'a@g.com'),
(14, 'far', 'mhjhj', 'hjhjh', '656565', 'a@a.com', 'mnjhj', 'hjhjhjh', '545', 'a@a.com'),
(16, 'sanika', 'tyu', 'tyuty', '8764345678', 'dfrdr@hihi.com', 'tyuty', 'tyuyt', '5656565656', 'vaishali@dbit.in');

-- --------------------------------------------------------

--
-- Table structure for table `student_placement_info`
--

CREATE TABLE IF NOT EXISTS `student_placement_info` (
  `sr_no` int(4) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`stu_id`),
  UNIQUE KEY `sr_no` (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `student_placement_info`
--

INSERT INTO `student_placement_info` (`sr_no`, `stu_id`, `resume_upload`, `grad_year`, `fname`, `mname`, `lname`, `dept`, `gender`, `mobile`, `email`, `dob`, `caste`, `religion`, `pob`, `aadhaar`, `address`, `city`, `state`, `pc`, `interest`, `status`) VALUES
(8, '', 'yes', '2016', 'raj', 'bharat', 'shah', 'IT', 'male', '5454', 'a@a.com', '2016-08-02', 'open', 'jhj', 'hjhjhjh', '354', 'khgjhgjhg', 'mnjnjn', 'kjnkjkj', '545454', 'yes', 'unplaced'),
(16, '12', 'yes', '2013', 'dae', 'dae', 'drd', 'on', 'on', '9876565465', 'd@j.com', '1998-05-18', 'on', 'ugtyjt', 'yjry', '123456789456', 'jytyjtj', 'ttyjt', 'thrt', '400093', 'yes', 'unplaced'),
(21, '25', 'no', '2017', 'cd', 'cd', 'cd', 'on', 'on', '9619082271', 'vaishali_sakpal@rediffmail.com', '27/11/85', 'on', 'dfd', 'das', '', 'dssa', 'mumbai', 'Maharashtra', '400037', 'yes', 'unplaced'),
(4, '313amritha3488', 'yes', 'dd', 'dsasd', 'sdd', 'sdad', 'IT', 'female', '233', 'cab@sd.com', '223', 'open', 'dfsdf', 'ddvdsv', 'dvsdv', 'dcc', 'czxc zx', 'dfaf', '4324', 'yes', 'unplaced'),
(1, '313candida3473', 'yes', 'df', 'jg', 'gjh', 'hj', 'IT', 'female', 'yjhmn', 'candida2295@gmail.com', 'jh', 'open', 'hgvn', 'hjnb', 'jhnb ', 'jhmbn', 'jhmn', 'jhm', 'jghn', 'yes', 'unplaced'),
(2, '313claw1111', 'yes', 'eds', 'xcv', 'xc', 'xc', 'IT', 'female', 'xc', 'rclaudia761@gmail.com', 'jh', 'open', 'hfg', 'hgf', 'hg', 'ghf', 'ghf', 'ghf', 'hgf', 'yes', 'unplaced'),
(14, '315aditya4231', 'yes', '2016', 'Aditya', 'Nitin', 'Bhagwat', 'on', 'on', '9820271097', 'bhagwataditya226@gmail.com', '1997-10-27', 'on', 'Hinduism', 'kalyan', '435667891234', 'asjbakjaklsndla', 'Thane', 'Maharashtra', '400607', 'yes', 'unplaced'),
(17, '33', 'yes', '2015', 'nikhita', 'suneil', 'bhat', 'on', 'on', '9619082271', 'bhat.sanika@gmail.com', '1998-05-18', 'on', 'hhhh', 'hhhh', '123456789456', 'ngfuht', 'fhfgh', 'ghgh', '400093', 'yes', 'unplaced'),
(20, '40', 'yes', '2007', 'gurpreet', 'dae', 'drd', 'on', 'on', '9876565465', 'd@j.com', '1998-05-18', 'on', 'hhhh', 'yjry', '123456789011', 'ftfhf', 'mumbai', 'fjyf', '400093', 'yes', 'unplaced'),
(3, 'a', 'yes', 'sad', 'gfb', 'hg', 'hg', 'IT', 'female', 'hmb', 'amrith@gmail.com', 'gfhb', 'open', 'hg', 'nvb ', 'hgbn', 'ghv ', 'dgfd', 'gfdgbfd', 'gfdbgfd', 'yes', 'unplaced'),
(10, 'abcd', 'yes', '2016', 'hjh', 'hjh', 'h', 'IT', 'male', '656565656', 'a@a.com', '2016-08-04', 'open', 'mnj', 'hjh', 'jhj', 'jh', 'kjhjh', 'jhjhj', '88545', 'yes', 'unplaced'),
(22, 'daelyn', 'no', '2016', 'dae', 'dae', 'ads', 'on', 'on', '9619082271', 'daelynoliveira3@gmail.com', '1998-05-18', 'on', 'dfd', 'utut', '123456789011', 'tfhft', 'mumbai', 'Maharashtra', '400093', 'yes', 'unplaced'),
(13, 'far', 'yes', '321', 'jbjbjb', 'jkjbjkb', 'jbjbj', 'IT', 'male', '323133', 'a@a.com', '2016-08-01', 'open', 'dssdsds', 'sdfsdsd', '121', 'sdsdsds', 'dsdsds', 'dsdsd', '2321', 'yes', 'unplaced'),
(15, 'sanika', 'yes', '2017', 'nikhita', 'suneil', 'bhat', 'on', 'on', '9619082271', 'bhat.sanika@gmail.com', '1998-05-18', 'on', 'hhhh', 'hhhh', '123456789456', 'sddfghh', 'fjyfy', 'fjyf', '877567', 'yes', 'unplaced');

-- --------------------------------------------------------

--
-- Table structure for table `stu_details`
--

CREATE TABLE IF NOT EXISTS `stu_details` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `branch` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tpc`
--

INSERT INTO `tpc` (`ID`, `username`, `password`, `branch`) VALUES
(1, 'tpc', 'tpc', ''),
(3, 'abcd', 'abcd', 'IT'),
(4, 'can', 'can', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `undertakingcheck`
--

CREATE TABLE IF NOT EXISTS `undertakingcheck` (
  `branch` varchar(30) NOT NULL,
  `rollno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undertakingcheck`
--

INSERT INTO `undertakingcheck` (`branch`, `rollno`) VALUES
('IT', 12),
('comps', 23),
('MECH', 1),
('MECH', 2),
('MECH', 3),
('IT', 1),
('IT', 2),
('COMPS', 1),
('COMPS', 2),
('COMPS', 3),
('COMPS', 4),
('COMPS', 5),
('COMPS', 6),
('COMPS', 7),
('COMPS', 8),
('COMPS', 9),
('COMPS', 10),
('COMPS', 1),
('COMPS', 2),
('COMPS', 3),
('COMPS', 45),
('COMPS', 46),
('COMPS', 90),
('IT', 10),
('IT', 11),
('IT', 12),
('IT', 73),
('IT', 12),
('IT', 15),
('COMPS', 2),
('COMPS', 3),
('IT', 3),
('COMPS', 3),
('COMPS', 9),
('IT', 2),
('IT', 2),
('IT', 8),
('IT', 4);



--
-- Table structure for table `newsfeed`
--

DROP TABLE IF EXISTS `newsfeed`;
CREATE TABLE IF NOT EXISTS `newsfeed` (
  `Content` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`Content`, `datetime`) VALUES
('', '2019-08-27 23:47:37'),
('infosys coming DBIT', '2019-08-27 23:47:48');

-- --------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


