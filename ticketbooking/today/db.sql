-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2016 at 02:14 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Accathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
`id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `job_code` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`, `job_code`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'master', 'master', 'mstr'),
(3, 'master2', 'master2', 'mstr'),
(4, 'master3', 'master3', 'mstr'),
(5, 'master4', 'master4', 'mstr'),
(6, 'master5', 'master5', 'mstr'),
(7, 'master6', 'master6', 'mstr'),
(8, 'master7', 'master7', 'mstr'),
(9, 'master8', 'master8', 'mstr'),
(10, 'master9', 'master9', 'mstr'),
(11, 'master10', 'master10', 'mstr');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `tb_admin_fname` varchar(20) NOT NULL,
  `tb_admin_lname` varchar(20) NOT NULL,
  `tb_admin_midname` varchar(20) NOT NULL,
  `tb_admin_gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `tb_admin_fname`, `tb_admin_lname`, `tb_admin_midname`, `tb_admin_gender`) VALUES
(1, 'ram', 'shyam', '', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tb_price`
--

CREATE TABLE `tb_price` (
`price_id` int(11) NOT NULL,
  `price_amt` int(11) NOT NULL,
  `price_stn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stn_list`
--

CREATE TABLE `tb_stn_list` (
`stn_id` int(11) NOT NULL,
  `stn_code` varchar(4) NOT NULL,
  `stn_name` varchar(20) NOT NULL,
  `stn_mstr_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stn_list`
--

INSERT INTO `tb_stn_list` (`stn_id`, `stn_code`, `stn_name`, `stn_mstr_id`) VALUES
(1, 'BPN', 'Baiyappanahalli', 2),
(2, 'SVR', 'SwamiVivekananda Rd', 3),
(3, 'IDN', 'Indiranagar', 4),
(4, 'HLS', 'Halasuru', 5),
(5, 'TNT', 'Trinity', 6),
(6, 'MGR', 'M G Road', 7),
(7, 'CBP', 'Cubbon Park', 8),
(8, 'VDS', 'Vidhana Soudha', 9),
(9, 'SMV', 'Sir M.Visveshwarya', 10),
(10, 'MJC', 'Majestic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stn_mastr`
--

CREATE TABLE `tb_stn_mastr` (
  `login_id` int(11) NOT NULL,
`tb_stn_mastr_id` int(20) NOT NULL,
  `tb_stn_mastr_fname` varchar(20) NOT NULL,
  `tb_stn_mastr_lname` varchar(20) NOT NULL,
  `tb_stn_mastr_midname` varchar(20) NOT NULL,
  `tb_stn_mastr_gender` varchar(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stn_mastr`
--

INSERT INTO `tb_stn_mastr` (`login_id`, `tb_stn_mastr_id`, `tb_stn_mastr_fname`, `tb_stn_mastr_lname`, `tb_stn_mastr_midname`, `tb_stn_mastr_gender`) VALUES
(2, 1, 'Devi', 'Prasad', '', 'Male'),
(3, 2, 'Narayan', 'Singh', '', 'Male'),
(4, 3, 'Ramesh ', 'Kumar', '', 'Male'),
(5, 4, 'siva', 'karpurapu', 'kalyan', 'male'),
(6, 5, 'Denis', 'Jack', '', 'Male'),
(7, 6, 'jayesh', 'raj', '', 'male'),
(8, 7, 'Kumar', 'Vishawas', '', 'Male'),
(9, 8, 'Devi', 'lal', '', ''),
(10, 9, 'Krishna', 'Kumar', '', 'Male'),
(11, 10, 'Sandeep', 'Kumar', '', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ticket`
--

CREATE TABLE `tb_ticket` (
`tick_id` int(11) NOT NULL,
  `tick_stn_from` varchar(20) NOT NULL,
  `tick_stn_to` varchar(20) NOT NULL,
  `tick_time` time NOT NULL,
  `tick_date` date NOT NULL,
  `tick_mobile` varchar(10) DEFAULT NULL,
  `tick_email_id` varchar(11) DEFAULT NULL,
  `tick_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=430004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ticket`
--

INSERT INTO `tb_ticket` (`tick_id`, `tick_stn_from`, `tick_stn_to`, `tick_time`, `tick_date`, `tick_mobile`, `tick_email_id`, `tick_price`) VALUES
(1, 'adad', 'aavf', '13:42:59', '2016-09-24', NULL, '0', 12),
(2, 'adad', 'dad', '15:28:00', '2016-09-14', NULL, NULL, 22),
(5, '1', '7', '17:42:32', '2016-09-24', NULL, NULL, 0),
(9, '1', '10', '17:09:55', '2016-09-24', NULL, NULL, 0),
(123, '4', '6', '13:50:55', '2016-09-24', NULL, NULL, 0),
(12333, '1', '1', '14:45:44', '2016-09-23', NULL, NULL, 0),
(12334, '1', '1', '15:21:20', '2016-09-24', NULL, NULL, 0),
(12335, '1', '7', '15:21:30', '2016-09-24', NULL, NULL, 0),
(12336, '1', '7', '15:22:23', '2016-09-24', NULL, NULL, 0),
(12337, '1', '1', '15:25:46', '2016-09-24', NULL, NULL, 0),
(12338, '1', '1', '15:26:42', '2016-09-24', NULL, NULL, 0),
(12339, '1', '4', '15:30:27', '2016-09-24', NULL, NULL, 0),
(12340, '1', '6', '15:31:27', '2016-09-24', NULL, NULL, 0),
(12341, '1', '6', '15:32:09', '2016-09-24', NULL, NULL, 0),
(12342, '1', '6', '15:33:00', '2016-09-24', NULL, NULL, 0),
(12343, '1', '7', '15:33:55', '2016-09-24', NULL, NULL, 0),
(12344, '1', '7', '15:34:28', '2016-09-24', NULL, NULL, 0),
(12347, '1', '8', '17:10:58', '2016-09-24', NULL, NULL, 0),
(12348, '1', '8', '17:12:10', '2016-09-24', NULL, NULL, 0),
(12349, '1', '7', '17:12:14', '2016-09-24', NULL, NULL, 0),
(12350, '5', '10', '17:38:30', '2016-09-24', NULL, NULL, 0),
(12351, '1', '1', '17:38:38', '2016-09-24', NULL, NULL, 0),
(12352, '1', '1', '17:38:57', '2016-09-24', NULL, NULL, 0),
(430000, '1', '1', '17:40:38', '2016-09-24', NULL, NULL, 0),
(430001, '1', '6', '17:40:42', '2016-09-24', NULL, NULL, 0),
(430002, '1', '6', '17:41:02', '2016-09-24', NULL, NULL, 0),
(430003, '1', '6', '17:41:06', '2016-09-24', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_name` (`name`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
 ADD KEY `id` (`id`), ADD KEY `id_2` (`id`), ADD KEY `id_3` (`id`);

--
-- Indexes for table `tb_price`
--
ALTER TABLE `tb_price`
 ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `tb_stn_list`
--
ALTER TABLE `tb_stn_list`
 ADD PRIMARY KEY (`stn_id`), ADD UNIQUE KEY `stn_code` (`stn_code`), ADD KEY `fk_mastr_id` (`stn_mstr_id`);

--
-- Indexes for table `tb_stn_mastr`
--
ALTER TABLE `tb_stn_mastr`
 ADD PRIMARY KEY (`tb_stn_mastr_id`), ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Indexes for table `tb_ticket`
--
ALTER TABLE `tb_ticket`
 ADD PRIMARY KEY (`tick_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_price`
--
ALTER TABLE `tb_price`
MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_stn_list`
--
ALTER TABLE `tb_stn_list`
MODIFY `stn_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_stn_mastr`
--
ALTER TABLE `tb_stn_mastr`
MODIFY `tb_stn_mastr_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_ticket`
--
ALTER TABLE `tb_ticket`
MODIFY `tick_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=430004;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `Login` (`id`);

--
-- Constraints for table `tb_stn_list`
--
ALTER TABLE `tb_stn_list`
ADD CONSTRAINT `fk_mastr_id` FOREIGN KEY (`stn_mstr_id`) REFERENCES `tb_stn_mastr` (`tb_stn_mastr_id`);

--
-- Constraints for table `tb_stn_mastr`
--
ALTER TABLE `tb_stn_mastr`
ADD CONSTRAINT `fk_login_id` FOREIGN KEY (`login_id`) REFERENCES `Login` (`id`);
