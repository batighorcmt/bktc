-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 01:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bktcedu_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admited_student`
--

CREATE TABLE `admited_student` (
  `row_id` int(5) NOT NULL,
  `app_id` int(5) NOT NULL,
  `trainee_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `contract` int(10) NOT NULL,
  `file_submit` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(11) NOT NULL,
  `insname` varchar(300) NOT NULL,
  `ssession` varchar(50) NOT NULL,
  `pic_file` varchar(300) NOT NULL,
  `studname` varchar(300) NOT NULL,
  `cnumber` varchar(15) NOT NULL,
  `fathername` varchar(300) NOT NULL,
  `mothername` varchar(300) NOT NULL,
  `gnumber` varchar(15) NOT NULL,
  `studemail` varchar(300) NOT NULL,
  `brdateday` int(2) NOT NULL,
  `brdatemonth` int(2) NOT NULL,
  `brdateyear` int(4) NOT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `selecttrade` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `saddress` varchar(300) NOT NULL,
  `selnation` varchar(100) NOT NULL,
  `bg` varchar(20) NOT NULL,
  `nid` int(17) NOT NULL,
  `sscboard` varchar(20) NOT NULL,
  `sscyear` int(4) NOT NULL,
  `sscroll` int(8) NOT NULL,
  `sscresult` varchar(20) NOT NULL,
  `sscgrade` varchar(10) NOT NULL,
  `sscregi` int(20) NOT NULL,
  `jscboard` varchar(20) NOT NULL,
  `jscyear` int(4) NOT NULL,
  `jscroll` int(10) NOT NULL,
  `jscresult` varchar(20) NOT NULL,
  `jscgrade` varchar(10) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `pdate` varchar(15) DEFAULT NULL,
  `rmobile` varchar(20) NOT NULL,
  `pamount` int(10) DEFAULT NULL,
  `rtransection` varchar(50) NOT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `app_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_id`, `insname`, `ssession`, `pic_file`, `studname`, `cnumber`, `fathername`, `mothername`, `gnumber`, `studemail`, `brdateday`, `brdatemonth`, `brdateyear`, `dob`, `selecttrade`, `course`, `religion`, `gender`, `saddress`, `selnation`, `bg`, `nid`, `sscboard`, `sscyear`, `sscroll`, `sscresult`, `sscgrade`, `sscregi`, `jscboard`, `jscyear`, `jscroll`, `jscresult`, `jscgrade`, `ptype`, `pdate`, `rmobile`, `pamount`, `rtransection`, `reference`, `app_date`) VALUES
(1, 'a', '2', '11.jpg', 'b', 'v', 'h', '01642514245', '', '', 20, 6, 1996, NULL, 'h', '', 'religion', '', 'j', 'jk', 'jhjkhj', 12510, 'hjk', 2012, 419079, '4.63', '', 21245152, 'jas', 2012, 251121, '3.60', '', 'Bkash', NULL, '01762396713', NULL, 'rtransection', NULL, '2024-05-24 17:32:26'),
(2, 'jss', '2012', 'pic.jpg', 'abdul', '01762396713', 'kheder', 'mini', '01531349963', 'hali@bktc.edu.bd', 20, 6, 1996, NULL, '360 hoours', '', 'isalm', '', 'jorepukruai', 'Bangladeshi', 'O+', 2212, 'Jashore', 2012, 251241, 'GPA', '2.50', 24251, 'Jashore', 2010, 2541562, '', '', '', NULL, '', NULL, '', NULL, '2024-05-24 18:02:40'),
(3, 'insname', '0', 'pic_file', 'studname', 'cnumber', 'fathername', 'mothername', 'gnumber', 'studemail', 0, 0, 0, NULL, 'selecttrade', '', 'religion', '', 'saddress', 'selnation', 'bg', 0, 'sscboard', 0, 0, 'sscresult', 'sscgrade', 0, 'jscboard', 0, 0, 'jscresult', 'jscgrade', 'ptype', NULL, 'rmobile', NULL, 'rtransection', NULL, '2024-05-24 18:07:21'),
(4, 'insname', '0', 'pic_file', 'studname', 'cnumber', 'fathername', 'mothername', 'gnumber', 'studemail', 0, 0, 0, NULL, 'selecttrade', '', 'religion', '', 'saddress', 'selnation', 'bg', 0, 'sscboard', 0, 0, 'sscresult', 'sscgrade', 0, 'jscboard', 0, 0, 'jscresult', 'jscgrade', 'ptype', NULL, 'rmobile', NULL, 'rtransection', NULL, '2024-05-24 18:07:37'),
(5, '1', '1', '', ' dfkgh', 'h dfjkhgjk h', 'k hgjk hk', ' fjkhgjk', ' fjkh jkdf', ' dfjkghdkfhg ', 1, 1, 122, NULL, 'BASIC TRADE 360 HOURS', '', 'I', '', ' g j', 'B', 'B+', 0, '', 0, 0, 'gpa', ' HHKDF', 0, ' DFJKKDF', 0, 0, 'gpa', ' GHKJH', 'Bkash', NULL, '  FG', NULL, ' FKGH', NULL, '2024-05-24 18:14:22'),
(6, '1', '1', '', 'ABDUL HALIM', '01762396713', 'KHEDER ALI', 'MINIARA', '01531349963', 'halimtalk9@gmail.com', 20, 6, 1996, NULL, 'BASIC TRADE 360 HOURS', '', 'I', '', 'Joerpukuria', 'B', 'B+', 2147483647, 'Jessore', 2012, 419079, 'gpa', '4.63', 502173, 'National University', 2018, 5214121, 'gpa', '2.32', 'Bkash', NULL, '01885926363', NULL, 'HJ5JGB8', NULL, '2024-05-24 18:18:41'),
(7, 'Bamondi Karigori Training Center', '0', '', 'Humayon', '01531349963', 'Ferdos', 'Joli', '01778731028', 'j@j.com', 20, 6, 1996, '20/06/1996', 'Certificate Course ( One Year)', '', 'Islam', '', 'Jorepukuria, Gangni', 'Bangladeshi', 'O+', 253512141, 'Comilla', 2012, 202020, 'gpa', '4.30', 102030, 'National University', 2019, 4512523, 'gpa', '2.50', '', NULL, '01401203010', NULL, ' SDGFJSGJ', NULL, '2024-05-24 18:30:20'),
(8, 'Bamondi Karigori Training Center', 'January-June/2024', '856b87ac03.jpg', 'ABDUL HALIM', '01762396713', 'SD H FHSK ', 'gf df', '01778731028', 'dfgdfgh@gdfg.com', 1, 12, 2012, '01/12/2012', 'BASIC TRADE 360 HOURS', 'Computer Office Application', 'Islam', 'Male', 'bnm  ', 'Bangladeshi', 'B+', 15521212, 'Barisal', 2012, 545, 'gpa', '1.22', 454554, 'National University', 2014, 125464, 'gpa', '2.30', 'Bkash', '25/05/2024', '121', 2000, '25454DDF ', 'Halim', '2024-05-24 20:51:10'),
(9, 'Bamondi Karigori Training Center', 'January-June/2024', '8f7a59597b.jpg', 'Md. Abdul Halim', '01762396713', 'Md. Kheder Ali', 'Mst. Miniara Begum', '01531349963', 'halimtalk9@gmail.com', 20, 6, 1996, '20/06/1996', 'BASIC TRADE 360 HOURS', 'Computer Office Application', 'Islam', 'M', 'Jorepukuria, Gangni, Meherpur', 'Bangladeshi', 'O+', 2147483647, 'Jessore', 2012, 419079, 'gpa', '4.63', 702153, 'National University', 2014, 987654, 'gpa', '2.81', 'Bkash', '25/05/2024', '01885926363', 5000, '25454DDF', 'Abdul Halim', '2024-05-24 21:11:07'),
(10, 'Bamondi Karigori Training Center', 'January-June/2024', '821e031655.jpeg', 'Md. Abdul Halim', '01762396713', 'Md. Kheder Ali', 'Mst. Miniara Begum', '01778731028', 'halimtalk9@gmail.com', 20, 6, 1996, '20/06/1996', 'BASIC TRADE 360 HOURS', 'Computer Office Application', 'Islam', 'Male', 'Jorepukuria', 'Bangladeshi', '', 2147483647, 'Jessore', 2012, 123456, 'gpa', '4.63', 454554, 'National University', 2018, 1542, 'gpa', '2.30', 'Cash', '', '', 0, '', '', '2024-05-25 15:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `br_id` int(11) NOT NULL,
  `br_name` varchar(300) NOT NULL,
  `br_address` varchar(300) NOT NULL,
  `br_dirname` varchar(300) NOT NULL,
  `br_dirmob` varchar(15) NOT NULL,
  `br_status` varchar(10) NOT NULL,
  `br_createtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`br_id`, `br_name`, `br_address`, `br_dirname`, `br_dirmob`, `br_status`, `br_createtime`) VALUES
(1, 'Bamondi Karigori Training Center', '', '', '', 'Active', '2024-04-04 08:10:59'),
(2, 'Batighor Computers', 'Jorepukuria', 'Md. Abdul Halim', '01762396713', 'Inactive', '2024-05-24 16:24:05'),
(3, 'abc', 'def', 'ghi', '0121141545', 'Inactive', '2024-05-24 16:24:14'),
(4, '', '', '', '', 'Active', '2024-05-26 16:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` int(5) NOT NULL,
  `course_name` varchar(300) NOT NULL,
  `course_status` varchar(20) NOT NULL,
  `session_id` int(5) NOT NULL,
  `br_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`, `course_status`, `session_id`, `br_id`, `create_time`) VALUES
(2, 21, 'Fine Arts', 'Active', 0, 0, '2024-05-26 16:28:25'),
(3, 22, 'Computer Technology', 'Active', 0, 0, '2024-05-26 16:38:15'),
(4, 23, 'Physical Education', 'Active', 0, 0, '2024-05-26 16:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_cat`
--

CREATE TABLE `expenses_cat` (
  `expenses_cat_id` int(11) NOT NULL,
  `expenses_name` varchar(255) NOT NULL,
  `e1` int(11) NOT NULL,
  `e2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `form_id` int(11) NOT NULL,
  `course_name` varchar(300) NOT NULL,
  `trade_name` varchar(300) NOT NULL,
  `form_session` varchar(300) NOT NULL,
  `br_id` int(5) NOT NULL,
  `frm_status` varchar(10) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`form_id`, `course_name`, `trade_name`, `form_session`, `br_id`, `frm_status`, `create_time`) VALUES
(1, '360 Hours Basic Computers', 'Office Application', 'Jan-Jul 2024', 1, 'Active', '2024-04-04 09:21:22'),
(2, '360 Hours Basic Computers', 'Database Programming', 'Jan-Dec (2024)', 1, 'Active', '2024-04-04 09:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `hr_id` int(10) NOT NULL,
  `hr_name` varchar(255) NOT NULL,
  `hr_designation` varchar(255) NOT NULL,
  `hr_mobile` varchar(255) NOT NULL,
  `hr_email` varchar(255) NOT NULL,
  `hr_photo` varchar(255) NOT NULL,
  `hr_pre_add` varchar(255) NOT NULL,
  `hr_par_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`hr_id`, `hr_name`, `hr_designation`, `hr_mobile`, `hr_email`, `hr_photo`, `hr_pre_add`, `hr_par_add`) VALUES
(26, 'Md. Abdul Halim', 'Manager', '01762396713', '', '', '', ''),
(27, 'Md. Zabedul Islam', 'Manager', '01885926363', '', '', '', ''),
(28, 'Md. Abdul', 'Office Assistant', '01531349963', '', '', '', ''),
(29, 'Md Abdul Halim', 'Office Assistant', 'admin', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `inst_data`
--

CREATE TABLE `inst_data` (
  `inst_id` int(10) NOT NULL,
  `inst_name` varchar(255) NOT NULL,
  `inst_estd` varchar(255) NOT NULL,
  `inst_add` varchar(255) NOT NULL,
  `inst_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inst_data`
--

INSERT INTO `inst_data` (`inst_id`, `inst_name`, `inst_estd`, `inst_add`, `inst_address`) VALUES
(1, 'Bamondi Karigori Training Center', '2019', 'Dr. Moklesur Rahman Building (2nd Floor), Posu Hat Road, ', 'Bamundi, Gangni, Meherpur.');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_date` varchar(20) NOT NULL,
  `notice_title` varchar(500) NOT NULL,
  `notice_text` text DEFAULT NULL,
  `notice_file` varchar(500) DEFAULT NULL,
  `notice_create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notice_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_date`, `notice_title`, `notice_text`, `notice_file`, `notice_create_time`, `notice_status`) VALUES
(3, '03-04-2024 ', 'dfdf', 'fdfds', '8f7743d71c.pdf', '2024-04-03 19:50:29', 'Active'),
(4, '05-06-2024 ', 'পরীক্ষামূলক টাইটেল', 'পরীক্ষামূলক তথ্য বিবরণী', '', '2024-06-05 07:45:12', 'Active'),
(5, '04-04-2024 ', '৬ মাস মেয়াদী কম্পিউটার প্রশিক্ষণ ব্যাচে ভর্তির শেষ সময় ১৮/০৪/২০২৪', 'ভর্তি ফি মাত্র ২৫০০ টাকা (অফার চলাকালীন সময়ের জন্য মাত্র)', '77ac976d67.docx', '2024-04-03 20:00:51', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(200) NOT NULL,
  `page_meta` varchar(200) NOT NULL,
  `page_content` text NOT NULL,
  `page_tag` varchar(200) NOT NULL,
  `page_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_meta`, `page_content`, `page_tag`, `page_added`) VALUES
(1, 'About', 'About us BKTC, Bed, Arts crafts', '<blockquote><ul><li><strong>Hello World!</strong></li></ul></blockquote><figure class=\"image\"><img style=\"aspect-ratio:439/565;\" src=\"pagesimg/5.jpg\" width=\"439\" height=\"565\"></figure><p>&nbsp;</p><p>&nbsp;</p><figure class=\"table\"><table><thead><tr><th>SL</th><th>Student Name</th><th>Father Name</th><th>Course</th><th>Email</th><th>Status</th></tr></thead><tbody><tr><td>1</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure><p>বিশেষ তথ্য ভেরিফিকেশনের জন্য যোগাযোগ করুন।</p>', 'BKTC, Meherpur', '2024-05-24 12:05:12'),
(2, 'Privacy Policy', 'Privacy Policy', '', 'Privacy Policy, BKTC, Meherpur, BPED, Arts and Crafts', '2024-05-22 17:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `session_name` varchar(300) NOT NULL,
  `session_status` varchar(10) NOT NULL,
  `session_form` varchar(10) NOT NULL,
  `br_id` int(5) NOT NULL,
  `course_id` int(5) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_name`, `session_status`, `session_form`, `br_id`, `course_id`, `create_time`) VALUES
(1, 'January-June/2024', 'Active', 'Open', 1, 1, '2024-05-24 16:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `text` varchar(200) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `photo`, `title`, `text`, `status`, `create_time`) VALUES
(1, 'demo.jpg', 'Hello', 'This is hello text', 'Active', '2024-04-01 09:44:04'),
(2, 'demo1.jpg', 'Hellohhgfhgh gh ', 'This is hello textg h gf gf gf gf', 'Active', '2024-04-01 09:44:08'),
(7, '80ac57ddce.jpg', 'batighor computers', '', 'Active', '2024-04-04 10:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `std_list`
--

CREATE TABLE `std_list` (
  `std_sys_id` int(10) NOT NULL,
  `app_id` int(5) NOT NULL,
  `trainee_id` varchar(15) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `hw_name` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `post` varchar(50) DEFAULT NULL,
  `union` varchar(50) DEFAULT NULL,
  `upazila` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `present_add` varchar(200) DEFAULT NULL,
  `permanent_add` varchar(200) DEFAULT NULL,
  `study_label` varchar(50) DEFAULT NULL,
  `mobile` varchar(17) DEFAULT NULL,
  `file_submit` varchar(5) DEFAULT NULL,
  `batch` varchar(50) DEFAULT NULL,
  `course_name` varchar(200) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL,
  `shift` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `contract` int(6) DEFAULT NULL,
  `admission_month` varchar(15) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `std_list`
--

INSERT INTO `std_list` (`std_sys_id`, `app_id`, `trainee_id`, `s_name`, `f_name`, `m_name`, `hw_name`, `village`, `post`, `union`, `upazila`, `district`, `present_add`, `permanent_add`, `study_label`, `mobile`, `file_submit`, `batch`, `course_name`, `s_email`, `shift`, `status`, `year`, `img`, `contract`, `admission_month`, `note`, `created_time`, `update_time`) VALUES
(990, 0, '2024001', 'MD. ABDUL HALIM', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'Yes', 'January-June', NULL, NULL, '10.00 AM', 'Admited', '2024', NULL, 0, 'February-2024', '', '2024-02-15 17:08:35', '2024-02-15 17:08:56'),
(991, 0, '2024002', ' hjfj qj ', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '4500', 'Yes', 'January-June', '360 Hours Computer Office Application', NULL, '11.00 AM', 'Admited', '2024', NULL, 0, 'February-2024', '', '2024-02-15 17:36:24', '2024-02-15 17:36:24'),
(992, 0, '2024003', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'No', 'January-June', 'Advanced Computer Course (1 Year)', NULL, '10.00 AM', 'Admited', '2024', NULL, 0, 'February-2024', '', '2024-02-16 12:12:09', '2024-02-16 12:12:09'),
(993, 0, '2024004', 'MD. ABDUL HALIM', 'Kheder Ali', 'MST. MINIARA BEGUM', 'Mst Ayesha', NULL, NULL, NULL, NULL, NULL, 'jore', 'jorepukuria', 'BBA', '01762396714', 'Yes', 'January-June', 'Advanced Fine and Arts Course (1 Year)', NULL, '10.00 AM', 'Admited', '2024', NULL, 30000, 'February-2024', 'DEmo', '2024-02-16 13:15:59', '2024-02-16 13:15:59'),
(994, 0, '2024005', 'MD. ABDUL HALIM', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '01711', 'Yes', 'January-June', 'Advanced Computer Course (1 Year)', NULL, '11.00 AM', 'Admited', '2024', NULL, 0, 'February-2024', '', '2024-02-16 13:21:29', '2024-02-16 13:21:29'),
(995, 0, '2024006', 'MD. ABDUL HALIM', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '01721', 'Yes', 'January-June', 'Advanced Computer Course (1 Year)', NULL, '10.00 AM', 'Admited', '2024', NULL, 0, 'February-2024', '', '2024-02-16 13:23:21', '2024-02-16 13:23:21'),
(996, 0, '2024007', 'MD. ABDUL HALIM', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '01762', 'Yes', 'January-June', 'Advanced B.P.ED Course (1 Year)', NULL, '12.00 PM', 'Admited', '2024', NULL, 0, 'February-2024', '', '2024-02-16 13:26:00', '2024-02-16 13:26:00'),
(997, 0, '2024008', 'Noyon', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '0171', 'Yes', 'January-June', 'Advanced Computer Course (1 Year)', NULL, '11.00 AM', 'Admited', '2024', NULL, 0, 'February-2024', '', '2024-02-16 14:53:06', '2024-02-16 14:53:06'),
(998, 0, '2024009', 'Badsha', 'Abbas', 'Masura', 'noyon tara', NULL, NULL, NULL, NULL, NULL, 'Present Add', 'Permanent add', 'HSC', '0191', 'No', 'January-June', '360 Hours Database Management', NULL, '10.00 AM', 'Admited', '2024', NULL, 4500, 'February-2024', 'Ref by Abdul Halim', '2024-02-16 14:56:30', '2024-02-16 14:56:30'),
(999, 0, '2024010', 'Hamim Islam', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '01851', 'No', 'January-June', 'Advanced Fine and Arts Course (1 Year)', NULL, '01.00 PM', 'Admited', '2024', '5e593739c7.jpg', 0, 'February-2024', '', '2024-02-16 15:35:53', '2024-02-16 15:35:53'),
(1003, 0, '2024011', 'Abdul Halim', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'Yes', 'January-June', '360 Hours Computer Office Application', NULL, '01.00 PM', 'Admited', '2024', '77b83fdc57.jpg', 0, 'February-2024', '', '2024-02-16 15:46:23', '2024-02-16 15:46:23'),
(1004, 0, '2024012', 'Tuhin Ali', '', '', '', NULL, NULL, NULL, NULL, NULL, 'Pirtola, Betbaria, Gangni, Meherpur', 'Pirtola, Betbaria, Gangni, Meherpur', 'HSC', '0123', 'Yes', 'January-June', '360 Hours Computer Office Application', NULL, '04.00 PM', 'Admited', '2024', 'f0b36ccb1b.jpg', 4500, 'February-2024', '', '2024-02-16 15:49:02', '2024-02-16 15:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `sly_id` int(11) NOT NULL,
  `sly_course` varchar(200) NOT NULL,
  `sly_title` varchar(200) NOT NULL,
  `sly_status` varchar(10) NOT NULL,
  `sly_file` varchar(200) NOT NULL,
  `sly_create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`sly_id`, `sly_course`, `sly_title`, `sly_status`, `sly_file`, `sly_create_time`) VALUES
(1, '360 Hours Computer Basic Course', 'কম্পিউটার অফিস অ্যাপ্লিকেশন ', 'Active', 'e8d0b8ff68.pdf', '2024-04-03 23:59:34'),
(2, 'Advanced Course (Fine Arts)', 'ফাইন আর্টস লিখিত পরীক্ষার সিলেবাস', 'Active', '4bf7adb0f8.docx', '2024-04-04 00:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `trade_id` int(11) NOT NULL,
  `trade_code` int(5) NOT NULL,
  `trade_name` varchar(200) NOT NULL,
  `trade_status` varchar(20) NOT NULL,
  `course_id` int(5) NOT NULL,
  `session_id` int(5) NOT NULL,
  `br_id` int(5) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`trade_id`, `trade_code`, `trade_name`, `trade_status`, `course_id`, `session_id`, `br_id`, `create_time`) VALUES
(3, 30, 'National Skill Standard Basic', 'Active', 0, 0, 0, '2024-05-26 16:36:16'),
(4, 80, 'Advanced Certificate Course', 'Active', 0, 0, 0, '2024-05-26 16:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `trainee_payment`
--

CREATE TABLE `trainee_payment` (
  `payment_sys_id` int(11) NOT NULL,
  `trainee_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_txn` varchar(50) DEFAULT NULL,
  `payment_amount` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `trainee_payment`
--

INSERT INTO `trainee_payment` (`payment_sys_id`, `trainee_id`, `payment_date`, `payment_method`, `payment_txn`, `payment_amount`, `remarks`, `create_time`, `updated`) VALUES
(1, 20240101, '2023-12-30', NULL, NULL, 500, '1st payment', '2023-12-30 17:42:42', '0000-00-00'),
(2, 20240101, '2023-12-30', NULL, NULL, 2200, 'Admission Fee', '2023-12-30 17:43:35', '0000-00-00'),
(3, 20240102, '2023-12-30', NULL, NULL, 2000, 'Admission Fee', '2023-12-30 17:44:01', '0000-00-00'),
(4, 20240103, '2023-12-30', NULL, NULL, 1500, '', '2023-12-30 17:45:14', '0000-00-00'),
(5, 20240106, '2024-01-13', NULL, NULL, 1300, 'Test 13/01/24', '2024-01-13 07:32:44', '0000-00-00'),
(6, 20240101, '2024-01-13', 'Bkash', 'DGDHG56H4HF454', 5001, 'Add payment with txn ID and method', '2024-01-13 07:52:31', '0000-00-00'),
(7, 20240107, '0000-00-00', 'Cash', 'DGDHG5', 150, 'date picker activated\r\n', '2024-01-13 07:57:36', '0000-00-00'),
(8, 20240101, '2024-01-13', 'Cash', '', 15000, 'Cash received by Halim.', '2024-01-13 08:13:29', '0000-00-00'),
(9, 20240101, '2024-01-13', 'Cash', '', 5000, '', '2024-01-13 09:12:39', '0000-00-00'),
(10, 20240106, '2024-01-13', 'Cash', '', 12300, '', '2024-01-13 09:12:45', '0000-00-00'),
(11, 20240103, '2024-01-13', 'Cash', '', 25430, '', '2024-01-13 09:12:52', '0000-00-00'),
(12, 20240102, '2024-01-13', 'Cash', '', 2500, '', '2024-01-13 09:13:00', '0000-00-00'),
(13, 20240102, '2024-01-13', 'Cash', 'UT6DF4', 3500, 'LAST ', '2024-01-13 10:10:00', '0000-00-00'),
(14, 20240101, '2024-01-13', 'Nagad', '12j1f5kj9', 13400, 'Hello', '2024-01-13 16:45:47', '0000-00-00'),
(15, 20240106, '2024-01-13', 'Nagad', '12j1f5kj9', 13600, 'hello', '2024-01-13 16:46:10', '0000-00-00'),
(16, 20240106, '2024-01-13', 'Cash', '', 800, 'Final payment', '2024-01-13 16:46:35', '0000-00-00'),
(17, 20240105, '2024-01-13', 'Cash', '', 20, '', '2024-01-13 16:53:01', '0000-00-00'),
(18, 20240105, '2024-01-13', 'Cash', '', 501, '', '2024-01-13 16:53:25', '0000-00-00'),
(19, 2024001, '2024-02-15', 'Cash', 'DGDHG56H4HF454', 2200, 'fgfh', '2024-02-15 17:09:59', '0000-00-00'),
(20, 2024001, '2024-02-15', 'Cash', '12j1f5kj9', 2155212, 'dg dfg ', '2024-02-15 17:24:16', '0000-00-00'),
(21, 2024002, '2024-02-15', 'Cash', 'DGDHG5', 4000, '', '2024-02-15 17:36:57', '0000-00-00'),
(22, 2024012, '2024-02-17', 'Cash', 'DGDHG5', 1500, '2nd Payment', '2024-02-17 18:50:10', '0000-00-00'),
(23, 2024009, '2024-02-17', 'Cash', 'DGDHG5HH', 20000, 'Thanks', '2024-02-17 18:51:45', '0000-00-00'),
(24, 2024012, '2024-02-17', 'Cash', 'fhsdjhdjh', 35000, '', '2024-02-17 18:52:59', '0000-00-00'),
(25, 2024012, '2024-02-17', 'Cash', '', 75000, '', '2024-02-17 18:53:10', '0000-00-00'),
(26, 2024013, '2024-02-17', 'Cash', '', 1000, '', '2024-02-17 19:08:06', '0000-00-00'),
(27, 2024001, '2024-03-05', 'Cash', '', 2000, '', '2024-02-17 19:08:21', '0000-00-00'),
(28, 2024001, '2024-04-12', 'Cash', '', 1000, '', '2024-02-17 19:08:45', '0000-00-00'),
(29, 2024013, '2024-03-25', 'Cash', '', 2000, '', '2024-02-17 19:09:13', '0000-00-00'),
(30, 2024013, '2024-05-12', 'Cash', '', 1000, '', '2024-02-17 19:09:31', '0000-00-00'),
(31, 2024013, '2024-02-18', 'Cash', '', 5000, '', '2024-02-18 05:12:42', '0000-00-00'),
(32, 2024013, '2024-02-18', 'Bkash', 'HSI6A3KFA', 5000, '', '2024-02-18 06:46:32', '0000-00-00'),
(33, 2024013, '2024-02-18', 'Cash', '', 4000, '', '2024-02-18 09:30:56', '0000-00-00'),
(34, 2024012, '2024-02-18', 'Bkash', '', 5000, '', '2024-02-18 14:56:36', '0000-00-00'),
(35, 2024013, '2024-02-18', 'Cash', '', 19000, '', '2024-02-18 14:56:47', '0000-00-00'),
(36, 2024004, '2024-05-24', 'Cash', '', 2200, '', '2024-05-24 21:36:23', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `txn_cat`
--

CREATE TABLE `txn_cat` (
  `txn_cat_id` int(11) NOT NULL,
  `txn_type_id` int(5) NOT NULL,
  `txn_cat_name` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `txn_cat`
--

INSERT INTO `txn_cat` (`txn_cat_id`, `txn_type_id`, `txn_cat_name`, `create_time`) VALUES
(1, 1, 'Student Fees', '2024-02-21 17:22:39'),
(2, 1, 'Selling Practical Note', '2024-02-21 17:22:39'),
(3, 2, 'House Rent', '2024-02-21 17:23:03'),
(4, 2, 'Electricity Bill', '2024-02-21 17:23:23'),
(5, 2, 'Employees Salary ', '2024-02-21 17:23:42'),
(7, 2, 'Purchase Product', '2024-02-22 17:38:41'),
(8, 3, 'Loan from Person', '2024-02-22 17:39:11'),
(9, 3, 'Loan From Bank', '2024-02-26 16:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `txn_type`
--

CREATE TABLE `txn_type` (
  `txn_type_id` int(11) NOT NULL,
  `txn_type_name` varchar(255) NOT NULL,
  `e1` int(11) NOT NULL,
  `e2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `txn_type`
--

INSERT INTO `txn_type` (`txn_type_id`, `txn_type_name`, `e1`, `e2`) VALUES
(1, 'Income', 0, 0),
(2, 'Expenses', 0, 0),
(3, 'Loan', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `user_id`, `user_photo`) VALUES
(1, 'admin', '9a6313cd9958a4762e610185f7abd488', 'admin', 'Abdul Halim', 2024001, 'view.png'),
(13, '01762396713', '01762396713', 'manager', 'Md. Abdul Halim', 26, ''),
(14, '01885926363', '01885926363', 'manager', 'Md. Zabedul Islam', 27, ''),
(15, '01531349963', '9a6313cd9958a4762e610185f7abd488', 'manager', 'Md. Abdul', 28, ''),
(17, '01762396714', '7e43ed30dfa74402be7bc2009b764fc9', 'user', '', 993, ''),
(18, '01711', '7e43ed30dfa74402be7bc2009b764fc9', 'user', '', 994, ''),
(19, '01721', '$mobile', 'user', '', 2024006, ''),
(20, '01762', '492a64b364db97df2db7416becba4eae', 'user', '', 2024007, ''),
(21, '0171', '898dc2c947cee718e4afd7dfcb2f1a09', 'user', '', 2024008, ''),
(22, '0191', 'f55cae80eb012999557b87cc9c6a0945', 'user', '', 2024009, ''),
(23, '01851', '4144d9f81a777fe640ea3854bce3d6b4', 'user', '', 2024010, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admited_student`
--
ALTER TABLE `admited_student`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `expenses_cat`
--
ALTER TABLE `expenses_cat`
  ADD PRIMARY KEY (`expenses_cat_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`hr_id`);

--
-- Indexes for table `inst_data`
--
ALTER TABLE `inst_data`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_list`
--
ALTER TABLE `std_list`
  ADD PRIMARY KEY (`std_sys_id`),
  ADD UNIQUE KEY `std_sys_id` (`std_sys_id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`sly_id`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`trade_id`);

--
-- Indexes for table `trainee_payment`
--
ALTER TABLE `trainee_payment`
  ADD PRIMARY KEY (`payment_sys_id`);

--
-- Indexes for table `txn_cat`
--
ALTER TABLE `txn_cat`
  ADD PRIMARY KEY (`txn_cat_id`);

--
-- Indexes for table `txn_type`
--
ALTER TABLE `txn_type`
  ADD PRIMARY KEY (`txn_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_sys_id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admited_student`
--
ALTER TABLE `admited_student`
  MODIFY `row_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses_cat`
--
ALTER TABLE `expenses_cat`
  MODIFY `expenses_cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `hr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inst_data`
--
ALTER TABLE `inst_data`
  MODIFY `inst_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `std_list`
--
ALTER TABLE `std_list`
  MODIFY `std_sys_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `sly_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `trade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainee_payment`
--
ALTER TABLE `trainee_payment`
  MODIFY `payment_sys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `txn_cat`
--
ALTER TABLE `txn_cat`
  MODIFY `txn_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `txn_type`
--
ALTER TABLE `txn_type`
  MODIFY `txn_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
