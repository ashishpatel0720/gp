-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2017 at 03:01 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grabpustak`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `ad_id` int(10) UNSIGNED NOT NULL,
  `ad_title` varchar(500) NOT NULL,
  `ad_click_url` varchar(500) NOT NULL,
  `ad_image` varchar(400) NOT NULL,
  `ad_video_url` varchar(500) NOT NULL,
  `ad_category` int(11) NOT NULL,
  `ad_created_at` datetime NOT NULL,
  `ad_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_type` tinyint(4) NOT NULL,
  `book_alias` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `book_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `book_author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `book_isbn` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `book_short_desc` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `book_long_desc` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `book_pages` int(11) NOT NULL,
  `book_category` int(11) NOT NULL,
  `book_publisher` int(11) NOT NULL,
  `book_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_created_at` datetime NOT NULL,
  `book_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `paper_or_publication_date` date NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `book_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_type`, `book_alias`, `book_path`, `book_title`, `book_author`, `book_isbn`, `book_short_desc`, `book_long_desc`, `book_pages`, `book_category`, `book_publisher`, `book_image`, `book_created_at`, `book_updated_at`, `paper_or_publication_date`, `is_html`, `book_deleted`) VALUES
(1, 2, 'skdkdl', '/var/www/grabpustak/static/books_pdf/', 'skdkdl', 'sdlkdlsk', 'dsldksl', '<p>this is gook t</p>\r\n', '<p>this is gook t</p>\r\n', 0, 7, 8, 'poster.png', '2017-01-08 20:06:38', '2017-01-08 14:36:38', '2017-01-08', 1, 0),
(2, 2, 'skdkdl', '/var/www/grabpustak/static/books_pdf/', 'skdkdl', 'sdlkdlsk', 'dsldksl', '<p>this is gook t</p>\r\n', '<p>this is gook t</p>\r\n', 0, 7, 8, 'poster.png', '2017-01-08 20:08:14', '2017-01-08 14:38:14', '2017-01-08', 1, 0),
(3, 2, 'skdkdl', '/var/www/grabpustak/static/books_pdf/', 'skdkdl', 'sdlkdlsk', 'dsldksl', '<p>this is gook t</p>\r\n', '<p>this is gook t</p>\r\n', 0, 7, 8, 'poster.png', '2017-01-08 20:11:19', '2017-01-08 14:41:19', '2017-01-08', 1, 0),
(4, 1, 'skdkdl', '/var/www/grabpustak/static/books_pdf/', 'skdkdl', 'sdlkdlsk', 'dsldksl', '<p>this is gook t</p>\r\n', '<p>this is gook t</p>\r\n', 0, 7, 8, 'poster.png', '2017-01-08 20:13:59', '2017-01-08 14:43:59', '2017-01-08', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mob` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_alias` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_description` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_tags` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_is_published` tinyint(1) NOT NULL,
  `course_is_deleted` tinyint(1) NOT NULL,
  `course_created_at` datetime NOT NULL,
  `course_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `user_id`, `course_alias`, `course_title`, `course_description`, `course_tags`, `course_is_published`, `course_is_deleted`, `course_created_at`, `course_updated_at`) VALUES
(1, 1, 'arvind-dhakad', 'arvind dhakad', '<p>Course Descriptionar</p>\r\n', '', 1, 0, '2017-01-04 18:03:50', '2017-01-24 05:25:13'),
(2, 1, 'sdldkdfkdlf', 'sdldkdfkdlf', '<p>Course Description</p>\r\n', '', 1, 0, '2017-01-20 12:35:45', '2017-01-24 05:25:17'),
(3, 1, 'sdldkdfkdlf', 'sdldkdfkdlf', '<p>Course Description</p>\r\n', '', 1, 0, '2017-01-20 12:35:56', '2017-01-24 05:25:20'),
(4, 1, 'thermo', 'thermo ', '<p>rtiekslkklzdfvdCourse Description</p>\r\n', '', 1, 0, '2017-01-20 12:37:17', '2017-01-24 05:25:23'),
(5, 1, 'thermo', 'thermo ', '<p>rtiekslkklzdfvdCourse Description</p>\r\n', '', 1, 0, '2017-01-20 12:41:43', '2017-01-24 05:25:25'),
(6, 6, 'dkfdfdllk', 'dkfdfdllk', '<p>dfldfdlfdlk</p>\n', '5', 1, 0, '2017-01-26 13:04:05', '2017-01-26 07:38:09'),
(7, 1, 'dkfdfdllk', 'dkfdfdllk', '<p>dfldfdlfdlk</p>\n', '5,6', 1, 0, '2017-01-26 13:04:17', '2017-01-26 07:39:04'),
(8, 2, 'lkdflkfdlkf', 'lkdflkfdlkf', '<p>kxcxlkfdlfdkl</p>\n', 'Absolute zero,AC power', 1, 0, '2017-01-26 13:07:10', '2017-01-27 02:41:09'),
(9, 1, 'ydfdfd', 'ydfdfd', '<p>rttkjrtkrl</p>\n', 'Absorbance,Acid-base reaction', 1, 0, '2017-01-26 13:09:32', '2017-01-26 07:39:32'),
(10, 1, 'dfldkfl', 'dfldkfl', '<p>kclfkdlfkd</p>\n', 'Absolute zero', 1, 0, '2017-01-26 13:20:56', '2017-01-26 07:50:56'),
(11, 1, 'gflgfgfd', 'gflgfgfd', '<p>fdfdfdfddfd</p>\n', 'Absolute pressure,Absorbance', 1, 0, '2017-01-26 13:23:18', '2017-01-26 07:53:18'),
(12, 1, 'xcxikcdsd', 'xcxikcdsd', '<p>sdsdsdsd</p>\n', 'Absolute motion,Absorbance', 1, 0, '2017-01-26 13:23:52', '2017-01-26 07:53:52'),
(13, 2, 'course1', 'course1', '<p>course1</p>\n', 'Absolute motion,Absolute pressure', 1, 0, '2017-01-27 06:24:12', '2017-01-27 00:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `course_assignments`
--

CREATE TABLE `course_assignments` (
  `material_id` int(11) NOT NULL,
  `material_alias` varchar(1000) NOT NULL,
  `material_course_id` int(10) UNSIGNED NOT NULL,
  `material_title` varchar(1000) NOT NULL,
  `material_description` varchar(5000) NOT NULL,
  `folder_path` varchar(500) NOT NULL,
  `material_type` tinyint(4) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `material_submission_lastdate` datetime DEFAULT NULL,
  `material_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_assignments`
--

INSERT INTO `course_assignments` (`material_id`, `material_alias`, `material_course_id`, `material_title`, `material_description`, `folder_path`, `material_type`, `is_deleted`, `material_submission_lastdate`, `material_created_at`) VALUES
(1, 'dfdf', 5, 'Dfdf', 'fdfdfdf', '7eaef59ed7e9ec3b9adac375b0c6ab82', 2, 0, '2017-01-03 00:00:00', '2017-01-26 09:28:38'),
(2, 'assignments', 13, 'Assignments', 'assignment description', '9cba0ae019b297b95c49f834c38e65e5', 2, 0, '2017-01-05 00:00:00', '2017-01-27 06:54:45'),
(3, 'this-is-assignment1', 8, 'This is assignment1', 'assignemtn2', '15f8bbd96712aa02cd1dd07b1fdf5d9b', 2, 0, '2016-12-29 00:00:00', '2017-01-27 12:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `course_material`
--

CREATE TABLE `course_material` (
  `material_id` int(11) NOT NULL,
  `material_alias` varchar(1000) NOT NULL,
  `material_course_id` int(10) UNSIGNED NOT NULL,
  `material_title` varchar(1000) NOT NULL,
  `material_description` varchar(5000) NOT NULL,
  `folder_path` varchar(500) NOT NULL,
  `material_type` tinyint(4) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `material_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_material`
--

INSERT INTO `course_material` (`material_id`, `material_alias`, `material_course_id`, `material_title`, `material_description`, `folder_path`, `material_type`, `is_html`, `is_deleted`, `material_created_at`) VALUES
(1, 'skdksj', 5, 'Skdksj', 'skdjskdj', '07dd9938a19cde78d3b7108405aab830', 1, 1, 0, '2017-01-25 14:31:59'),
(2, 'material2', 5, 'Material2', 'thiisi smetrial 2', '4936eb95e33d75ad531a5011dd712a0f', 1, 1, 0, '2017-01-25 14:34:20'),
(3, 'meterial2', 5, 'Meterial2', 'materal2 desc', '030a5d68a9568c0d3236b0781cec9e79', 1, 1, 0, '2017-01-26 08:23:07'),
(4, 'study-material1', 13, 'Study material1', 'sks', 'ff6f341452f0aec39dea4b475805098f', 1, 1, 0, '2017-01-27 06:25:27'),
(5, 'studymaterial1', 8, 'Studymaterial1', 'study material description', '40e53385982f3287139e8839af7dc82d', 1, 1, 0, '2017-01-27 08:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `enrollment_date` datetime NOT NULL,
  `is_enrolled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `user_id`, `course_id`, `enrollment_date`, `is_enrolled`) VALUES
(1, 2, 1, '2017-01-24 03:17:31', 0),
(2, 2, 3, '2017-01-24 03:17:31', 0),
(11, 2, 4, '2017-01-25 08:17:32', 1),
(12, 2, 2, '2017-01-25 08:18:11', 1),
(13, 2, 5, '2017-01-26 09:11:25', 1),
(14, 2, 6, '2017-01-26 09:21:31', 1),
(15, 2, 7, '2017-01-26 10:03:44', 1),
(16, 3, 8, '2017-01-26 10:08:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `main_category_id` int(10) UNSIGNED NOT NULL,
  `main_category_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `main_category_prior` float NOT NULL DEFAULT '0',
  `main_category_created_at` datetime NOT NULL,
  `main_category_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`main_category_id`, `main_category_title`, `main_category_prior`, `main_category_created_at`, `main_category_updated_at`) VALUES
(1, 'Engineering', 0, '2016-10-11 17:12:03', '2016-10-11 17:12:03'),
(2, 'School', 0, '2016-10-11 17:13:08', '2016-10-11 17:14:01'),
(3, 'Competitive Exams', 0, '2016-10-11 17:12:17', '2016-10-11 17:14:15'),
(4, 'Comics', 0, '2016-10-11 17:13:08', '2016-10-11 17:13:08'),
(5, 'Literature', 0, '2016-10-11 17:13:08', '2016-10-19 17:40:23'),
(6, 'Maganizes', 0, '2016-10-11 17:13:08', '2016-10-11 17:14:18'),
(7, 'Health, philosophy and Self help', 0, '0000-00-00 00:00:00', '2016-10-19 17:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `material_types`
--

CREATE TABLE `material_types` (
  `material_type_id` int(11) NOT NULL,
  `material_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_types`
--

INSERT INTO `material_types` (`material_type_id`, `material_name`) VALUES
(1, 'study'),
(2, 'assignments'),
(3, 'syllabus');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(10) UNSIGNED NOT NULL,
  `publisher_alias` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_contact` int(10) NOT NULL,
  `publisher_password` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_desc` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_verified` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(2050) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_created_at` datetime NOT NULL,
  `publisher_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `publisher_alias`, `publisher_title`, `publisher_email`, `publisher_contact`, `publisher_password`, `publisher_desc`, `publisher_verified`, `hash`, `publisher_created_at`, `publisher_updated_at`) VALUES
(7, 'Grabpustak', 'Grabpustak', 'grabpustak@gmail.com', 1234567899, '3af691524e7b42659ee8e7af9e77caf1c237c86d202bf2619174228ca9b1aa3d', '', 1, NULL, '2016-10-11 23:16:01', '2016-10-11 17:46:50'),
(8, 'arvind', 'arvind', 'arvind.dhakad.1123@gmail.com', 2147483647, '83ce9c38981d82d5b332565fba68e6bf09aa78dc3acd6550ec0f0f521016a889', '65737bca6807b9e5e2bc79c8745b8a03421ebf6610990386bdac5a924d77cb10d4b6db0b3b40b7504ccaf39cb75ca43aebadd7b178d1367f4184f90182455825', 1, 'd60d4f4152768f8136167f8dbd0d6c748f1465d6181de098377387923771b3951745299587362f41a12989522013862e28ab56af8bbcbaaf177e288832bae729', '2017-01-08 19:30:39', '2017-01-20 06:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) UNSIGNED NOT NULL,
  `subject_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject_main_category` int(11) NOT NULL,
  `subject_subcategory` int(11) NOT NULL,
  `subject_prior` float NOT NULL,
  `subject_created_at` datetime NOT NULL,
  `subject_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_title`, `subject_main_category`, `subject_subcategory`, `subject_prior`, `subject_created_at`, `subject_updated_at`) VALUES
(1, 'Strength of material', 1, 2, 0, '2016-10-11 17:39:00', '2016-10-11 17:39:00'),
(2, 'Welding', 1, 2, 0, '2016-10-11 17:39:18', '2016-10-11 17:39:18'),
(3, 'Computer Networking', 1, 1, 0, '2016-10-11 17:40:24', '2016-10-11 17:40:24'),
(4, 'VLSI Design', 1, 1, 0, '2016-10-11 17:40:37', '2016-10-11 17:40:37'),
(5, 'Digital Signal Processing', 1, 1, 0, '2016-10-11 17:40:37', '2016-10-11 17:40:37'),
(6, 'Analog Communication', 1, 1, 0, '2016-10-11 17:40:37', '2016-10-11 17:40:37'),
(7, 'Machine Design\r\n', 1, 2, 0, '2016-10-11 17:58:52', '2016-10-11 17:58:52'),
(8, 'Global warming', 1, 2, 0, '2016-10-11 17:59:39', '2016-10-11 17:59:39'),
(9, 'General Studies\r\n', 1, 2, 0, '2016-10-11 17:59:49', '2016-10-11 17:59:49'),
(10, 'Refrigeration And Air Conditioning\r\n', 1, 2, 0, '2016-10-11 17:59:59', '2016-10-11 17:59:59'),
(11, 'Theory Of Machine\r\n', 1, 2, 0, '2016-10-11 18:00:11', '2016-10-11 18:00:11'),
(12, 'Casting', 1, 2, 0, '2016-10-11 17:39:00', '2016-10-18 15:09:54'),
(13, 'Fluid Machinery\r\n\r\n', 1, 2, 0, '2016-10-11 18:03:32', '2016-10-11 18:03:32'),
(14, 'Theory of Governor', 1, 2, 0, '2016-10-11 18:03:48', '2016-10-11 18:03:48'),
(15, 'Industrial Engineering', 1, 2, 0, '2016-10-11 18:04:06', '2016-10-11 18:04:06'),
(16, 'Machine-tool', 1, 2, 0, '2016-10-11 18:04:32', '2016-10-11 18:04:32'),
(17, 'Theory of Metal Cutting', 1, 2, 0, '2016-10-11 18:04:42', '2016-10-14 19:34:26'),
(18, 'I.C. Engine', 1, 2, 0, '2016-10-11 18:05:08', '2016-10-11 18:05:08'),
(19, 'Thermodynamics', 1, 2, 0, '2016-10-11 18:05:21', '2016-10-11 18:05:21'),
(20, 'Control Systems', 1, 5, 0, '2016-10-11 18:06:48', '2016-10-11 18:06:48'),
(21, 'Digital Electronics', 1, 5, 0, '2016-10-11 18:07:02', '2016-10-11 18:07:02'),
(22, 'Electrical Machines', 1, 5, 0, '2016-10-11 18:07:17', '2016-10-11 18:07:17'),
(23, 'Measurement', 1, 5, 0, '2016-10-11 18:14:43', '2016-10-11 18:14:43'),
(24, 'Microprocessor', 1, 5, 0, '2016-10-11 18:15:14', '2016-10-11 18:15:14'),
(25, 'Network', 1, 5, 0, '2016-10-11 18:15:28', '2016-10-11 18:15:28'),
(26, 'Power System', 1, 5, 0, '2016-10-11 18:15:49', '2016-10-11 18:15:49'),
(27, 'Signal and System', 1, 5, 0, '2016-10-11 18:16:03', '2016-10-11 18:16:03'),
(28, 'Power Electronics', 1, 5, 0, '2016-10-11 18:16:22', '2016-10-11 18:16:22'),
(29, 'Analog Electronics', 1, 5, 0, '2016-10-11 18:16:41', '2016-10-11 18:16:41'),
(30, 'Hydrology', 1, 3, 0, '2016-10-11 18:17:32', '2016-10-11 18:17:32'),
(31, 'Transportation Engineering', 1, 3, 0, '2016-10-11 18:17:32', '2016-10-11 18:17:32'),
(32, 'Irrigation Engineering', 1, 3, 0, '2016-10-11 18:18:23', '2016-10-11 18:18:23'),
(33, 'Mathematics', 1, 3, 0, '2016-10-11 18:18:23', '2016-10-14 19:35:43'),
(34, 'Building Material', 1, 3, 0, '2016-10-11 18:18:56', '2016-10-11 18:18:56'),
(35, 'Heat Transfer', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(36, 'Gear Box', 1, 2, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(37, 'Environment', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(38, 'Fluid Mechanics', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(39, 'Interphase Mass Transfer', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(40, 'Mathematics', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(41, 'Petro Chemical Technology', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(42, 'Chemical Process Control', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-15 14:09:41'),
(43, 'Process Equipment', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(44, 'Reaction Engineering', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(45, 'Thermodynamics', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(46, 'Transportation Technology', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(47, 'Instrumentation Process Control', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(48, 'Mass Transfer', 1, 7, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(49, 'Physics', 3, 9, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(50, 'Mathematics', 3, 9, 0, '2016-10-11 18:20:03', '2016-10-11 18:20:03'),
(51, 'Indian', 5, 10, 0, '0000-00-00 00:00:00', '2016-10-19 17:45:11'),
(52, 'Aayurveda', 7, 11, 0, '0000-00-00 00:00:00', '2016-10-19 17:57:28'),
(53, 'Healthy living', 7, 11, 0, '0000-00-00 00:00:00', '2016-10-19 17:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `s_id` int(11) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `s_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_sent_mails` int(11) NOT NULL,
  `s_unsubscribed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sub_category_main_category` int(11) NOT NULL,
  `sub_category_prior` float NOT NULL,
  `sub_category_created_at` datetime NOT NULL,
  `sub_category_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_title`, `sub_category_main_category`, `sub_category_prior`, `sub_category_created_at`, `sub_category_updated_at`) VALUES
(1, 'ECE', 1, 0, '2016-10-11 17:34:58', '2016-10-11 17:43:17'),
(2, 'Mechanical', 1, 0, '2016-10-11 17:35:12', '2016-10-11 17:43:20'),
(3, 'Civil', 1, 0, '2016-10-11 17:35:22', '2016-10-11 17:43:24'),
(4, 'Architecture and Planning', 1, 0, '2016-10-11 17:35:33', '2016-10-11 17:43:52'),
(5, 'Electrical', 1, 0, '2016-10-11 17:35:48', '2016-10-11 17:44:00'),
(6, 'CSE', 1, 0, '2016-10-11 17:36:00', '2016-10-11 17:44:05'),
(7, 'Chemical', 1, 0, '2016-10-11 17:36:09', '2016-10-11 17:44:42'),
(8, 'MSME', 1, 0, '2016-10-11 17:37:40', '2016-10-11 17:44:14'),
(9, 'IIT', 3, 0, '2016-10-11 17:34:58', '2016-10-11 17:43:17'),
(10, 'Classic', 5, 0, '2016-10-19 17:42:04', '2016-10-19 17:42:04'),
(11, 'Health', 7, 0, '0000-00-00 00:00:00', '2016-10-19 17:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `material_id` int(11) NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `material_title` varchar(1000) NOT NULL,
  `material_description` varchar(5000) NOT NULL,
  `folder_path` varchar(500) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `material_created_at` datetime NOT NULL,
  `material_uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_text` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_text`) VALUES
(2, 'Absolute electrode potential'),
(3, 'Absolute motion'),
(4, 'Absolute pressure'),
(5, 'Absolute zero'),
(6, 'Absorbance'),
(7, 'AC power'),
(8, 'Acceleration'),
(9, 'Acid'),
(10, 'Acid-base reaction'),
(11, 'Acid strength'),
(12, 'Acoustics'),
(13, 'Activated sludge'),
(14, 'Activated sludge model'),
(15, 'Active transport'),
(16, 'Actuator'),
(17, 'Acute angle'),
(18, 'Adenosine triphosphate'),
(19, 'Adhesion'),
(20, 'Adiabatic process'),
(21, 'Adiabatic wall'),
(22, 'Aerobic digestion'),
(23, 'Aerodynamics'),
(24, 'Aerospace engineering'),
(25, 'Afocal system'),
(26, 'Agricultural engineering'),
(27, 'Albedo'),
(28, 'Algae'),
(29, 'Algebra'),
(30, 'Algorithm'),
(31, 'Alkane'),
(32, 'Alkene'),
(33, 'Alkyne'),
(34, 'Alloy'),
(35, 'Alpha particle'),
(36, 'Alternating current'),
(37, 'Alternative hypothesis'),
(38, 'Ammeter'),
(39, 'Amino acid'),
(40, 'Amorphous solid'),
(41, 'Ampere'),
(42, 'Amphoterism'),
(43, 'Amplifier'),
(44, 'Amplitude'),
(45, 'Anaerobic digestion'),
(46, 'Angular acceleration'),
(47, 'Angular momentum'),
(48, 'Angular velocity'),
(49, 'Anion'),
(50, 'Annealing (metallurgy)'),
(51, 'Annihilation'),
(52, 'Anode'),
(53, 'ANSI'),
(54, 'Antigravity'),
(55, 'Antimatter'),
(56, 'Antineutron'),
(57, 'Antiparticle'),
(58, 'Antiproton'),
(59, 'Applied engineering (field)|Applied engi'),
(60, 'Arc length'),
(61, 'Archimedes\' principle'),
(62, 'Area moment of inertia'),
(63, 'Arithmetic mean'),
(64, 'Arithmetic sequence'),
(65, 'Aromatic hydrocarbon'),
(66, 'Arrhenius equation'),
(67, 'Artificial intelligence'),
(68, 'Assembly language'),
(69, 'Atom'),
(70, 'Atomic mass'),
(71, 'Atomic number'),
(72, 'Atomic packing factor'),
(73, 'Atomic physics'),
(74, 'Atomic structure'),
(75, 'Audio frequency'),
(76, 'Austenitization'),
(77, 'Automation'),
(78, 'Automaton'),
(79, 'Autonomous vehicle'),
(80, 'Avogadro\'s number'),
(81, 'Azimuthal quantum number'),
(82, 'Bacteria'),
(83, 'Balance sheet'),
(84, 'Barometer'),
(85, 'Baryon'),
(86, 'Battery (electricity)|Battery'),
(87, 'Base (chemistry)|Base'),
(88, 'Baud'),
(89, 'Beam (structure)|Beam'),
(90, 'Beer–Lambert law'),
(91, 'Belt (mechanical)|Belt'),
(92, 'Belt friction'),
(93, 'Bending'),
(94, 'Benefit–cost analysis'),
(95, 'Bending moment'),
(96, 'Bernoulli differential equation'),
(97, 'Bernoulli\'s equation'),
(98, 'Bernoulli\'s principle'),
(99, 'Beta particle'),
(100, 'Binomial random variable'),
(101, 'Biocatalysis'),
(102, 'Biochemistry'),
(103, 'Biology'),
(104, 'Biomedical engineering'),
(105, 'Biomimetic'),
(106, 'Bionics'),
(107, 'Biophysics'),
(108, 'Biot number'),
(109, 'Block and tackle'),
(110, 'Body force'),
(111, 'Boiler'),
(112, 'Boiler (power generation)'),
(113, 'Boiling point'),
(114, 'Boiling-point elevation'),
(115, 'Boltzmann constant'),
(116, 'Boson'),
(117, 'Boyle\'s law'),
(118, 'Bravais lattice'),
(119, 'Brayton cycle'),
(120, 'Break-even analysis'),
(121, 'Brewster\'s angle'),
(122, 'Brittle'),
(123, 'Bromide'),
(124, 'Brønsted–Lowry acid–base theory'),
(125, 'Brownian motion'),
(126, 'Buckingham ? theorem'),
(127, 'Buffer solution'),
(128, 'Bulk modulus'),
(129, 'Buoyancy'),
(130, 'Calculus'),
(131, 'Capacitance'),
(132, 'Capacitive reactance'),
(133, 'Capillarity'),
(134, 'Carbonate'),
(135, 'Carnot cycle'),
(136, 'Cartesian coordinates'),
(137, 'Casting'),
(138, 'Cathode'),
(139, 'Cathode ray'),
(140, 'Cell membrane'),
(141, 'Cell nucleus'),
(142, 'Cell theory'),
(143, 'Center of gravity'),
(144, 'Center of mass'),
(145, 'Center of pressure (fluid mechanics)|Cen'),
(146, 'Central force motion'),
(147, 'Central limit theorem'),
(148, 'Central processing unit'),
(149, 'Centripetal force'),
(150, 'Centroid'),
(151, 'Centrosome'),
(152, 'Chain reaction'),
(153, 'Change of base rule'),
(154, 'Charles\'s law'),
(155, 'Chemical bond'),
(156, 'Chemical compound'),
(157, 'Chemical equilibrium'),
(158, 'Chemical kinetics'),
(159, 'Chemical reaction'),
(160, 'Chemistry'),
(161, 'Chloride'),
(162, 'Chloroplast'),
(163, 'Chromate'),
(164, 'Chromosome'),
(165, 'Circle'),
(166, 'Circular motion'),
(167, 'Civil engineering'),
(168, 'Clausius–Clapeyron relation'),
(169, 'Clausius inequality'),
(170, 'Clausius theorem'),
(171, 'Coefficient of performance'),
(172, 'Coefficient of variation'),
(173, 'Coherence (physics)|Coherence'),
(174, 'Cohesion (chemistry)|Cohesion'),
(175, 'Combustion'),
(176, 'Compensation (engineering)|Compensation'),
(177, 'Compiler'),
(178, 'Compressive strength'),
(179, 'Computational fluid dynamics'),
(180, 'Computer'),
(181, 'Computer-aided design'),
(182, 'Computer-aided engineering'),
(183, 'Computer-aided manufacturing'),
(184, 'Computer engineering'),
(185, 'Computer science'),
(186, 'Concave lens'),
(187, 'Condensed matter physics'),
(188, 'Confidence interval'),
(189, 'Conjugate acid'),
(190, 'Conjugate base'),
(191, 'Continuum mechanics'),
(192, 'Control systems engineering'),
(193, 'Convex lens'),
(194, 'Corrosion'),
(195, 'Cosmic rays'),
(196, 'Coulomb'),
(197, 'Coulomb\'s law'),
(198, 'Covalent bond'),
(199, 'Crookes tube'),
(200, 'Cryogenics'),
(201, 'Crystallization'),
(202, 'Crystallography'),
(203, 'Curvilinear motion'),
(204, 'Cyclotron'),
(205, 'Dalton\'s law'),
(206, 'Damped vibration'),
(207, 'Darcy–Weisbach equation'),
(208, 'DC motor'),
(209, 'Decibel'),
(210, 'Definite integral'),
(211, 'Deflection (engineering)|Deflection'),
(212, 'Deformation (engineering)'),
(213, 'Deformation (mechanics)'),
(214, 'Degrees of freedom (mechanics)|Degrees o'),
(215, 'Delta robot'),
(216, 'Delta-wye transformer'),
(217, 'Density'),
(218, 'Derivative'),
(219, 'Design engineering'),
(220, 'Dew point'),
(221, 'Differential pulley'),
(222, 'Diffusion'),
(223, 'Dispersion (optics)|Dispersion'),
(224, 'Displacement (fluid)'),
(225, 'Displacement (vector)'),
(226, 'Distance'),
(227, 'Doppler effect'),
(228, 'Drag (physics)|Drag'),
(229, 'Ductility'),
(230, 'Dynamics (mechanics)|Dynamics'),
(231, 'Dyne'),
(232, 'Economics'),
(233, 'Elastic modulus'),
(234, 'Elasticity (physics)|Elasticity'),
(235, 'Electric charge'),
(236, 'Electric circuit'),
(237, 'Electric current'),
(238, 'Electric displacement field'),
(239, 'Electric generator'),
(240, 'Electric field'),
(241, 'Electric field gradient'),
(242, 'Electric motor'),
(243, 'Electric potential'),
(244, 'Electrical potential energy'),
(245, 'Electric power'),
(246, 'Electrical and electronics engineering'),
(247, 'Electrical conductor'),
(248, 'Electrical insulator'),
(249, 'Electrical network'),
(250, 'Electrical resistance'),
(251, 'Electricity'),
(252, 'Electrodynamics'),
(253, 'Electromagnet'),
(254, 'Electromagnetic field'),
(255, 'Electromagnetic radiation'),
(256, 'Electromechanics'),
(257, 'Electron'),
(258, 'Electronvolt'),
(259, 'Electron pair'),
(260, 'Electronegativity'),
(261, 'Electronics'),
(262, 'Endothermic'),
(263, 'Energy'),
(264, 'Engine'),
(265, 'Engineering'),
(266, 'Engineering economics'),
(267, 'Engineering ethics'),
(268, 'Environmental engineering'),
(269, 'Engineering physics'),
(270, 'Enzyme'),
(271, 'Escape velocity'),
(272, 'Estimator'),
(273, 'Euler-Bernoulli beam equation'),
(274, 'Exothermic'),
(275, 'Falling bodies'),
(276, 'Farad'),
(277, 'Faraday (unit)|Faraday'),
(278, 'Farad'),
(279, 'Faraday constant'),
(280, 'Fermat\'s principle'),
(281, 'Fick\'s laws of diffusion'),
(282, 'Finite element method'),
(283, 'Nuclear fission|Fission'),
(284, 'Fluid'),
(285, 'Fluid dynamics'),
(286, 'Fluid mechanics'),
(287, 'Fluid physics'),
(288, 'Fluid statics'),
(289, 'Flywheel'),
(290, 'Focus (optics)|Focus'),
(291, 'Foot-pound'),
(292, 'Fracture toughness'),
(293, 'Fraunhofer lines'),
(294, 'Free fall'),
(295, 'Frequency modulation'),
(296, 'Freezing point'),
(297, 'Friction'),
(298, 'Function (mathematics)|Function'),
(299, 'Fundamental frequency'),
(300, 'Fundamental interaction'),
(301, 'Fundamental theorem of calculus'),
(302, 'Fundamentals of Engineering Examination'),
(303, 'Nuclear fusion|Fusion'),
(304, 'Galvanic cell'),
(305, 'Gamma rays'),
(306, 'Gas'),
(307, 'Geiger counter'),
(308, 'General relativity'),
(309, 'Geometric mean'),
(310, 'Geometry'),
(311, 'Geophysics'),
(312, 'Geotechnical engineering'),
(313, 'Gluon'),
(314, 'Graham\'s law of diffusion'),
(315, 'Gravitation'),
(316, 'Gravitational constant'),
(317, 'Gravitational energy'),
(318, 'Gravitational field'),
(319, 'Gravitational potential'),
(320, 'Gravitational wave'),
(321, 'Gravity'),
(322, 'Ground state'),
(323, 'Hadron'),
(324, 'Half-life'),
(325, 'Haptic technology|Haptic'),
(326, 'Hardness'),
(327, 'Harmonic mean'),
(328, 'Heat'),
(329, 'Heat transfer'),
(330, 'Helmholtz free energy'),
(331, 'Henderson–Hasselbalch equation'),
(332, 'Henry\'s law'),
(333, 'Horsepower'),
(334, 'Huygens–Fresnel principle'),
(335, 'Ice point'),
(336, 'Ideal gas'),
(337, 'Ideal gas constant'),
(338, 'Ideal gas law'),
(339, 'Indefinite integral'),
(340, 'Identity (mathematics)|Identity'),
(341, 'Inertia'),
(342, 'Infrasound'),
(343, 'Integral'),
(344, 'Integral transform'),
(345, 'International System of Units'),
(346, 'Interval estimation'),
(347, 'Ion'),
(348, 'Ionic bond'),
(349, 'Ionization'),
(350, 'Electrical impedance|Impedance'),
(351, 'Inclined plane'),
(352, 'Industrial engineering'),
(353, 'Inorganic chemistry'),
(354, 'Isotope'),
(355, 'Kalman filter'),
(356, 'Kelvin'),
(357, 'Kinematics'),
(358, 'Kirchhoff\'s circuit laws'),
(359, 'Kirchhoff\'s equations'),
(360, 'Laminar flow'),
(361, 'Laplace transform'),
(362, 'LC circuit'),
(363, 'Le Chatelier\'s principle'),
(364, 'Lenz\'s law'),
(365, 'Lepton'),
(366, 'Lever'),
(367, 'L\'Hôpital\'s rule'),
(368, 'Light'),
(369, 'Linear algebra'),
(370, 'Linear elasticity'),
(371, 'Liquid'),
(372, 'Logarithm'),
(373, 'Identity (mathematics)#Logarithmic ident'),
(374, 'Lumped element model'),
(375, 'Mach number'),
(376, 'Machine'),
(377, 'Machine code'),
(378, 'Machine element'),
(379, 'Machine learning'),
(380, 'Maclaurin series'),
(381, 'Magnetic field'),
(382, 'Magnetism'),
(383, 'Manufacturing engineering'),
(384, 'Mass balance'),
(385, 'Mass density'),
(386, 'Mass moment of inertia'),
(387, 'Mass number'),
(388, 'Mass spectrometry'),
(389, 'Material properties'),
(390, 'Materials science'),
(391, 'Mathematical optimization'),
(392, 'Mathematical physics'),
(393, 'Mathematics'),
(394, 'Matrix (mathematics)|Matrix'),
(395, 'Matter'),
(396, 'Maxwell\'s equations'),
(397, 'Mean'),
(398, 'Measures of central tendency'),
(399, 'Mechanical advantage'),
(400, 'Mechanical engineering'),
(401, 'Mechanical filter'),
(402, 'Mechanical wave'),
(403, 'Mechanics'),
(404, 'Mechanism (engineering)|Mechanism'),
(405, 'Median'),
(406, 'Melting'),
(407, 'Melting point'),
(408, 'Meson'),
(409, 'Metal alloy'),
(410, 'Metallic bond'),
(411, 'Mid-range'),
(412, 'Midhinge'),
(413, 'Mining engineering'),
(414, 'Miller indices'),
(415, 'Mobile robot'),
(416, 'Mode (statistics)|Mode'),
(417, 'Modulus of elasticity'),
(418, 'Molality'),
(419, 'Molar concentration'),
(420, 'Molar absorptivity'),
(421, 'Molar mass'),
(422, 'Molding (process) |Molding'),
(423, 'Molecule'),
(424, 'Molecular physics'),
(425, 'Moment of inertia'),
(426, 'Multibody system'),
(427, 'Multidisciplinary design optimization'),
(428, 'Muon'),
(429, 'Nanoengineering'),
(430, 'Nanotechnology'),
(431, 'Navier–Stokes equations'),
(432, 'Neutrino'),
(433, 'Newtonian fluid'),
(434, 'Nth root|\'\'n\'\'th root'),
(435, 'Nuclear binding energy'),
(436, 'Nuclear engineering'),
(437, 'Nuclear physics'),
(438, 'Nuclear potential energy'),
(439, 'Nuclear power'),
(440, 'Ohm'),
(441, 'Ohm\'s law'),
(442, 'Optics'),
(443, 'Organic chemistry'),
(444, 'Osmosis'),
(445, 'Parallel circuit'),
(446, 'Parity (mathematics)'),
(447, 'Parity (physics)'),
(448, 'Paraffin wax|Paraffin'),
(449, 'Particle accelerator'),
(450, 'Particle displacement'),
(451, 'Particle physics'),
(452, 'Pascal\'s Law'),
(453, 'Pendulum'),
(454, 'Petroleum engineering'),
(455, 'pH'),
(456, 'Phase (matter)'),
(457, 'Phase (waves)'),
(458, 'Phase equilibrium'),
(459, 'Photon'),
(460, 'Physical chemistry'),
(461, 'Physical quantity'),
(462, 'Physics'),
(463, 'Planck constant'),
(464, 'Plasma physics'),
(465, 'Plasticity (physics)|Plasticity'),
(466, 'Pneumatics'),
(467, 'Point estimation'),
(468, 'Polyphase system'),
(469, 'Electric power|Power (electric)'),
(470, 'Power (physics)'),
(471, 'Power factor'),
(472, 'Pressure'),
(473, 'Probability'),
(474, 'Probability distribution'),
(475, 'Probability theory'),
(476, 'Psi particle'),
(477, 'Pulley'),
(478, 'Quantum electrodynamics'),
(479, 'Quantum field theory'),
(480, 'Quantum mechanics'),
(481, 'Quantum physics'),
(482, 'Quark'),
(483, 'Regelation'),
(484, 'Relative density'),
(485, 'Relative velocity'),
(486, 'Reliability engineering'),
(487, 'Electrical resistivity and conductivity|'),
(488, 'Reynolds number'),
(489, 'Rheology'),
(490, 'Rigid body'),
(491, 'Robonaut'),
(492, 'Robotics'),
(493, 'Root mean square|Root-mean-square'),
(494, 'Root-mean-square speed'),
(495, 'Rotational energy'),
(496, 'Rotational speed'),
(497, 'Sanitary engineering'),
(498, 'Saturation (chemistry)'),
(499, 'Saturated compound'),
(500, 'Scalar (mathematics)'),
(501, 'Scalar (physics)'),
(502, 'Scalar multiplication'),
(503, 'Screw (simple machine)|Screw'),
(504, 'Series circuit'),
(505, 'Servo motor|Servo'),
(506, 'Servomechanism'),
(507, 'Shadow matter'),
(508, 'Shear strength'),
(509, 'Shear stress'),
(510, 'Shortwave radiation'),
(511, 'SI units'),
(512, 'Signal processing'),
(513, 'Simple machine'),
(514, 'Siphon'),
(515, 'Solid mechanics'),
(516, 'Solid-state physics'),
(517, 'Solid solution strengthening'),
(518, 'Solubility'),
(519, 'Sound'),
(520, 'Special relativity'),
(521, 'Specific heat'),
(522, 'Specific gravity'),
(523, 'Specific volume'),
(524, 'Specific weight'),
(525, 'Spontaneous combustion'),
(526, 'State of matter'),
(527, 'Statics'),
(528, 'Statistics'),
(529, 'Stefan–Boltzmann law'),
(530, 'Stiffness'),
(531, 'Stoichiometry'),
(532, 'Deformation (mechanics)|Strain'),
(533, 'Work hardening|Strain hardening'),
(534, 'Strength of materials'),
(535, 'Stress (mechanics)|Stress'),
(536, 'Stress-strain analysis'),
(537, 'Stress-strain curve'),
(538, 'Structural analysis'),
(539, 'Structural load'),
(540, 'Sublimation (phase transition)|Sublimati'),
(541, 'Subsumption architecture'),
(542, 'Surface tension'),
(543, 'Superconductor'),
(544, 'Superhard material'),
(545, 'Robotic surgery|Surgical robot'),
(546, 'Technical standard'),
(547, 'Temperature'),
(548, 'Tensile force'),
(549, 'Tensile Modulus|Tensile modulus'),
(550, 'Tensile strength'),
(551, 'Tensile testing'),
(552, 'Tension member'),
(553, 'Thermal conduction'),
(554, 'Thermal equilibrium'),
(555, 'Thermal radiation'),
(556, 'Thermodynamics'),
(557, 'Theory of relativity'),
(558, 'Thévenin\'s theorem'),
(559, 'Three-phase'),
(560, 'Torque'),
(561, 'Torsional vibration'),
(562, 'Toughness'),
(563, 'Trajectory'),
(564, 'Transducer'),
(565, 'Trigonometric functions'),
(566, 'Trigonometry'),
(567, 'Trimean'),
(568, 'Triple point'),
(569, 'Trouton\'s rule'),
(570, 'Truncated mean'),
(571, 'Truss'),
(572, 'Turbine'),
(573, 'Turbomachinery'),
(574, 'Turbulence'),
(575, 'Ultimate tensile strength'),
(576, 'Uncertainty principle'),
(577, 'Unicode'),
(578, 'Unit vector'),
(579, 'Unsaturated compound'),
(580, 'Utility frequency'),
(581, 'Vacuole'),
(582, 'Vacuum'),
(583, 'Valence (chemistry)|Valence'),
(584, 'Valence band'),
(585, 'Valence bond theory'),
(586, 'Valence electron'),
(587, 'Valence shell'),
(588, 'Valve'),
(589, 'van der Waals equation'),
(590, 'van der Waals force'),
(591, 'van \'t Hoff equation'),
(592, 'van \'t Hoff factor'),
(593, 'Variable capacitor'),
(594, 'Variable resistor'),
(595, 'Vector space'),
(596, 'Venturi effect'),
(597, 'Vibration'),
(598, 'Viscoelasticity'),
(599, 'Viscosity'),
(600, 'Volt-ampere'),
(601, 'Volt-ampere reactive'),
(602, 'Volta potential'),
(603, 'Voltage'),
(604, 'Volumetric flow rate'),
(605, 'von Mises yield criterion'),
(606, 'Watt'),
(607, 'Wave'),
(608, 'Wavelength'),
(609, 'Wedge (mechanical device)|Wedge'),
(610, 'Weighted mean'),
(611, 'Wet-bulb temperature'),
(612, 'Wheel and axle'),
(613, 'Winsorized mean'),
(614, 'Cartesian coordinate system|X-coordinate'),
(615, 'Cartesian coordinate system|Y-coordinate'),
(616, 'Yield (engineering)|Yield'),
(617, 'Young\'s modulus'),
(618, 'Zero Defects'),
(619, 'Zeroth law of thermodynamics');

-- --------------------------------------------------------

--
-- Table structure for table `token_auth_cp`
--

CREATE TABLE `token_auth_cp` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `hash_out` varchar(2050) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_role` tinyint(4) NOT NULL,
  `user_verified` tinyint(1) NOT NULL,
  `hash` varchar(2050) DEFAULT NULL,
  `user_created_at` datetime NOT NULL,
  `user_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_name`, `user_email`, `user_password`, `user_role`, `user_verified`, `hash`, `user_created_at`, `user_updated_at`) VALUES
(1, '', 'Arvind Singh Dhakad', 'arvinda.my@gmail.com', '83ce9c38981d82d5b332565fba68e6bf09aa78dc3acd6550ec0f0f521016a889', 1, 0, NULL, '2017-01-27 05:45:36', '2017-01-27 01:06:26'),
(2, '', 'Arvind Singh Dhakad', 'arvind.dhakad.1123@gmail.com', '83ce9c38981d82d5b332565fba68e6bf09aa78dc3acd6550ec0f0f521016a889', 2, 0, NULL, '2017-01-27 05:46:01', '2017-01-27 02:41:20'),
(3, '', 'Arvind Dhakad Singh', 'arvind@grabpustak.in', '83ce9c38981d82d5b332565fba68e6bf09aa78dc3acd6550ec0f0f521016a889', 1, 0, NULL, '2017-01-27 08:14:34', '2017-01-27 02:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `user_info_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_description` varchar(6000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_twitter_id` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_facebook_id` varchar(500) DEFAULT NULL,
  `user_linkedin_url` varchar(500) DEFAULT NULL,
  `user_website` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_place` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_scholar_no` varchar(40) DEFAULT NULL,
  `user_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_phone` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`user_info_id`, `user_id`, `user_description`, `user_twitter_id`, `user_facebook_id`, `user_linkedin_url`, `user_website`, `user_place`, `user_dob`, `user_scholar_no`, `user_created_at`, `user_updated_at`, `user_phone`) VALUES
(1, 3, 'Hi folks, How you doing ?', 'arvind', 'arvind.dh', '', 'http://arvind.com', NULL, NULL, '141114016', '2017-01-22 12:07:33', '2017-01-27 08:41:59', '9589839532');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `book_id` (`book_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_assignments`
--
ALTER TABLE `course_assignments`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `course_material`
--
ALTER TABLE `course_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`main_category_id`);

--
-- Indexes for table `material_types`
--
ALTER TABLE `material_types`
  ADD PRIMARY KEY (`material_type_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD UNIQUE KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`user_info_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `ad_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `course_assignments`
--
ALTER TABLE `course_assignments`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_material`
--
ALTER TABLE `course_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `main_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `material_types`
--
ALTER TABLE `material_types`
  MODIFY `material_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=620;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `user_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;