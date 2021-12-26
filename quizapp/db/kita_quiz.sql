-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 04:06 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kita_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(100) NOT NULL,
  `name_admin` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `name_admin`, `email_admin`, `password_admin`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_badge`
--

CREATE TABLE `tbl_badge` (
  `id_badge` int(100) NOT NULL,
  `badge_name` varchar(50) NOT NULL,
  `badge_image` text NOT NULL,
  `badge_description` varchar(100) NOT NULL,
  `badge_status` int(1) NOT NULL,
  `badge_key` int(50) NOT NULL,
  `badge_required` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_badge`
--

INSERT INTO `tbl_badge` (`id_badge`, `badge_name`, `badge_image`, `badge_description`, `badge_status`, `badge_key`, `badge_required`) VALUES
(17, 'Silver', 'badge_1622556089_1.png', 'You need 200xp to unlcok this badge', 1, 200, '200xp'),
(18, 'Silver', 'badge_1622556673_2.png', 'You need 400xp to unlock this badge', 1, 400, '400xp'),
(19, 'Gold', 'badge_1622556713_3.png', 'You need 600xp to unlock this badge', 1, 600, '600xp'),
(20, 'Platinum', 'badge_1622556802_4.png', 'You need 800xp to unlock this badge', 1, 800, '800xp'),
(21, 'Diamond', 'badge_1622556843_5.png', 'You need 1000xp to unlock this badge', 1, 1000, '1000xp'),
(22, 'Master', 'badge_1622556888_6.png', 'You need 1500xp to unlock this badge', 1, 1500, '1500xp'),
(23, 'Gold Trophy', 'badge_1622618512_7.png', 'You need 1800xp to unlock this badge', 1, 1800, '1800 xp'),
(24, 'Jackpot', 'badge_1622618577_8.png', 'You need 2000 xp to unlock this badge', 1, 2000, '2000 xp'),
(25, 'Graduation Badge', 'badge_1622618610_9.png', 'You need 2500 for this badge', 1, 2500, '2500 xp'),
(26, 'Winner', 'badge_1622618638_10.png', 'You need 500 xp to unlock this badge', 1, 5000, '5000 xp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(111) NOT NULL,
  `cat_name` varchar(111) NOT NULL,
  `photo_cat` text NOT NULL,
  `cat_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `photo_cat`, `cat_status`) VALUES
(7, 'Knowledge', '1622640492_knowledge.png', 1),
(8, 'Youtube', '1622557164_youtube.png', 1),
(9, 'Udemy', '1622557183_udemy.png', 1),
(13, 'Linkedin', '1622600714_linkedin.png', 1),
(15, 'Twitter', '1622634510_twitter.png', 1),
(16, 'Instagram', '1622634529_instagram.png', 1),
(17, 'Programming', '1622640737_php.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz`
--

CREATE TABLE `tbl_quiz` (
  `id_quiz` int(100) NOT NULL,
  `name_quiz` varchar(100) NOT NULL,
  `image_quiz` text NOT NULL,
  `category_quiz` int(10) NOT NULL,
  `view_quiz` int(50) NOT NULL,
  `status_quiz` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_quiz`
--

INSERT INTO `tbl_quiz` (`id_quiz`, `name_quiz`, `image_quiz`, `category_quiz`, `view_quiz`, `status_quiz`) VALUES
(1, 'Wich Programming Language Are You? Take this Quiz', 'quiz_1622639928_programming-quiz.png', 17, 0, 1),
(3, 'Test Your Knowledge About Youtube, Are You Ready for This?', 'quiz_1622640182_youtubequiz.png', 8, 0, 1),
(4, 'Knowledge Base Quiz about Flag Of Country in this World, Ready?', 'quiz_1622640545_knowledgebase.jpg', 7, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_content`
--

CREATE TABLE `tbl_quiz_content` (
  `id_quiz_content` int(100) NOT NULL,
  `id_quiz` int(100) NOT NULL,
  `image_quiz_content` text NOT NULL,
  `question_quiz_content` varchar(100) NOT NULL,
  `answer_quiz_content` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_quiz_content`
--

INSERT INTO `tbl_quiz_content` (`id_quiz_content`, `id_quiz`, `image_quiz_content`, `question_quiz_content`, `answer_quiz_content`) VALUES
(6, 1, 'quiz_content_1621746056_flutter.jpg', 'This is Flutter Logo?', 1),
(7, 1, 'quiz_content_1621747581_profiles.jpg', 'This is bill gates founder Microsft?', 0),
(8, 1, 'quiz_content_1621754518_markz.jpeg', 'Mark zuckerberg was born in May 15 1988?', 0),
(9, 1, 'quiz_content_1621754875_clprogramming.jpg', 'This script written by C Programming Language?', 1),
(10, 1, 'quiz_content_1621755014_githubfounded.jpg', 'Github was founded in 2008?', 1),
(11, 1, 'quiz_content_1621755191_semicolonprogrammer.jpg', 'Kotlin is programming that without use semicolon?', 1),
(12, 1, 'quiz_content_1621755327_htmllanguage.jpg', 'Is html a Programming Language?', 0),
(13, 1, 'quiz_content_1621755512_writtenvariableinprogramming.jpg', 'Written symbol in first time on variable will be shown error in programming language?', 1),
(14, 1, 'quiz_content_1621755618_bestprogramminglanguage.jpg', 'C++ is the best Programming Language in 2019?', 0),
(15, 1, 'quiz_content_1621755893_scaffoldwidgets.jpg', 'Scaffold widget in flutter can\'t be used to shown Image from Internet?', 1),
(16, 3, 'quiz_content_1622640994_mailchimp.jpg', 'This is Youtube Logo?', 0),
(17, 4, 'quiz_content_1622642110_indonesia.jpg', 'This is Flag of Polandia?', 0),
(20, 3, 'quiz_content_1622641825_founderyoutube.jpg', 'This Guy Founder of Youtube?', 1),
(21, 4, 'quiz_content_1622642040_polandia.png', 'This is Flag of Indonesia?', 0),
(22, 4, 'quiz_content_1622642159_brunei.jpg', 'This is Flag of Brunei Darrusalam?', 1),
(23, 4, 'quiz_content_1622642187_rusia.jpg', 'This is Flag of Rusia?', 1),
(24, 4, 'quiz_content_1622642251_turkey.jpg', 'This is Flag of Turkey?', 1),
(25, 4, 'quiz_content_1622642320_qatar.jpg', 'This is Flag of Qatar?', 1),
(26, 4, 'quiz_content_1622642347_malaysia.jpg', 'This is Flag of Malaysia?', 1),
(27, 4, 'quiz_content_1622642379_cambodia.jpg', 'This is Flag of Iran?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(222) NOT NULL,
  `name_user` varchar(222) NOT NULL,
  `email_user` varchar(222) NOT NULL,
  `photo_user` text NOT NULL,
  `password` text NOT NULL,
  `score` bigint(255) NOT NULL,
  `status_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_badge`
--

CREATE TABLE `tbl_user_badge` (
  `id_user_badge` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_badge` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_badge`
--
ALTER TABLE `tbl_badge`
  ADD PRIMARY KEY (`id_badge`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indexes for table `tbl_quiz_content`
--
ALTER TABLE `tbl_quiz_content`
  ADD PRIMARY KEY (`id_quiz_content`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_badge`
--
ALTER TABLE `tbl_user_badge`
  ADD PRIMARY KEY (`id_user_badge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_badge`
--
ALTER TABLE `tbl_badge`
  MODIFY `id_badge` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  MODIFY `id_quiz` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_quiz_content`
--
ALTER TABLE `tbl_quiz_content`
  MODIFY `id_quiz_content` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(222) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_badge`
--
ALTER TABLE `tbl_user_badge`
  MODIFY `id_user_badge` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
