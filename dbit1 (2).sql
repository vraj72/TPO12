-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 12:23 PM
-- Server version: 5.6.23-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbit1`
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
('313amritha3488'),
('313candida3473'),
('a'),
('abcd');

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
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tpp` varchar(11) NOT NULL,
  `tpo` varchar(11) NOT NULL,
  `company` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `tpp`, `tpo`, `company`) VALUES
(9, 'yes', 'yes', 'yes'),
(10, 'vxcvx', 'xvxc', 'vxcvx'),
(12, 'dfdf', 'sdsf', 'fdf'),
(13, '', '', ''),
(14, '', '', ''),
(15, '', '', '');

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
  `cgpa` varchar(5) NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `title`, `content`, `date`, `branch`, `cgpa`) VALUES
(28, 'zxc', 'z', '2016-08-09 17:46:30', 'MECH', ''),
(29, 'asduygjhfn', 'sidfuvkszdjgks', '2016-08-09 18:08:19', 'IT', ''),
(30, 'aaaa', 'aaaaa', '2016-08-18 10:12:07', 'IT', ''),
(31, 'aaaa', 'aaaa', '2017-03-10 07:42:35', 'IT', ''),
(32, 'bbbb', 'hfhjfk', '2017-03-10 07:48:09', 'COMPS', '8'),
(33, 'infosys', 'rere', '2017-03-15 03:58:17', 'IT', '7'),
(34, 'TCs', 'dfd', '2017-03-15 04:12:44', 'IT', '9');

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
  PRIMARY KEY (`sr_no`,`stu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sr_no`, `stu_id`, `password`, `name`, `branch`, `email`, `status`) VALUES
(1, '313candida3473', 'abcd', 'Candida Rodrigues', 'IT', 'candida2295@gmail.com', 'allowed'),
(2, '313amritha3488', 'aaaa', NULL, 'MECH', NULL, 'allowed'),
(4, '313claw1111', '1111', NULL, 'extc', NULL, 'allowed'),
(5, 'a', 'a', NULL, 'COMPS', NULL, 'allowed'),
(6, 'far', 'far', 'Farheen', 'IT', NULL, 'allowed'),
(9, 'ab', 'ab', 'abc', 'IT', NULL, 'allowed');

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
  `cert` varchar(30) NOT NULL,
  `aggregate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_academic_info`
--

INSERT INTO `student_academic_info` (`sr_no`, `stu_id`, `X`, `Xboard`, `XII`, `XIIboard`, `Dip`, `Dipboard`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`, `sem7`, `LKTs`, `DKTs`, `cert`, `aggregate`) VALUES
(9, '', '90', 'MSBTE', '', '', '79', 'SBMP', '7', '8', '7', '8', '9', '9', '', '', '', '', 0),
(5, '313amritha3488', '51', 'fdfvfv', '455', 'vcvxv', '333', 'cvsx', '23', '32422', '3', '34', '324', '34', '345', '2', '', '', 0),
(2, '313candida3473', '34', 'fgv', '345', 'hnh', '45', 'yhgn', '8', '8', '8', '8', '8', '8', '8', '0', '0', 'tgfbv', 0),
(3, '313claw1111', '45', 'fdf', '56', 'fgf', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', 'thg', 0),
(4, 'a', '34', 'tgf', '345', 'hg', '6', 'hfh', '8', '8', '8', '8', '8', '8', '8', '8', '8', 'ujhm', 0),
(11, 'abcd', '79', 'dsds', '89', 'sdsd', '789', 'jhjh', '7', '7', '878', '8', '8', '8', '8', '8', '8', '322', 0),
(32, 'far', '90', 'sdd', '90', 'sds', '', '', '6', '6', '5', '6', '5', '6', '', '1', '1', '544', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `student_applied`
--

INSERT INTO `student_applied` (`id`, `stu_id`, `c_name`, `stu_name`, `email`, `branch`) VALUES
(1, 'a', 'cap', '', '', 'COMPS'),
(2, '313candida3473', 'eaf', 'Candida Rodrigues', 'candida2295@gmail.com', 'IT'),
(3, '313amritha3488', 'zxc', '', '', 'MECH'),
(4, 'a', 'cap', '', '', 'COMPS'),
(5, 'far', 'eaf', 'Farheen', '', 'IT'),
(6, 'a', 'eaf', '', '', 'COMPS'),
(7, 'a', 'cap', '', '', 'COMPS'),
(8, 'a', 'eaf', '', '', 'COMPS'),
(9, 'a', 'cap', '', '', 'COMPS'),
(10, 'a', 'cap', '', '', 'COMPS'),
(11, 'a', 'cap', '', '', 'COMPS'),
(12, 'a', 'cap', '', '', 'COMPS'),
(13, 'a', 'cap', '', '', 'COMPS'),
(14, 'a', 'eaf', '', '', 'COMPS'),
(15, '313candida3473', 'asduygjhfn', 'Candida Rodrigues', 'candida2295@gmail.com', 'IT'),
(16, '313candida3473', 'aaaa', 'Candida Rodrigues', 'candida2295@gmail.com', 'IT'),
(17, '313candida3473', 'infosys', 'Candida Rodrigues', 'candida2295@gmail.com', 'IT'),
(18, '313candida3473', 'TCs', 'Candida Rodrigues', 'candida2295@gmail.com', 'IT');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
