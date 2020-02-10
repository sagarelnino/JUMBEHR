-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 06:19 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jumb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created`) VALUES
(1, 'sayem@gmail.com', 'd63fe6f190c15627233789931371e6246e2f39ee', '2019-10-19 00:00:00'),
(2, 'test@gmail.com', '4cde7e0e408e4395607ae7bb74b9f4b6f92af548', '2019-10-21 18:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(512) NOT NULL,
  `university` varchar(512) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `name`, `designation`, `rank`, `session`, `phone`, `email`, `university`, `image`, `created`, `updated`) VALUES
(1, 'Sayem', 'President', 1, '2019-20', '01778765465', 'sayem@gmail.com', 'Jahangirnagar University', '1.jpg', '2019-10-16 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(190) NOT NULL,
  `eventDate` varchar(190) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `description` text,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `eventDate`, `image`, `description`, `created`) VALUES
(0, 'Bangladesh', '2019-10-23', 'Events.jpg', 'Teat', '2019-10-21 00:32:13'),
(0, 'Annual Picnic', '2019-12-31', 'Events.jpg', 'Annual picnic at Saint Martins', '2019-10-21 18:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `founder`
--

CREATE TABLE `founder` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(512) NOT NULL,
  `university` varchar(512) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `founder`
--

INSERT INTO `founder` (`id`, `name`, `designation`, `rank`, `session`, `phone`, `email`, `university`, `image`, `created`, `updated`) VALUES
(1, 'Sayem', 'President', 1, '2019-20', '01778765465', 'sayem@gmail.com', 'Jahangirnagar University', '1.jpg', '2019-10-16 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `honorarium`
--

CREATE TABLE `honorarium` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(512) NOT NULL,
  `university` varchar(512) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honorarium`
--

INSERT INTO `honorarium` (`id`, `name`, `designation`, `rank`, `session`, `phone`, `email`, `university`, `image`, `created`, `updated`) VALUES
(1, 'Sayem', 'President', 1, '2019-20', '01778765465', 'sayem@gmail.com', 'Jahangirnagar University', '1.jpg', '2019-10-16 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `university` varchar(512) NOT NULL,
  `phone` varchar(512) NOT NULL,
  `proficiency` varchar(512) DEFAULT NULL,
  `homeDistrict` varchar(512) DEFAULT NULL,
  `experience` varchar(10) DEFAULT NULL,
  `department` varchar(100) NOT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `image` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`id`, `userId`, `name`, `university`, `phone`, `proficiency`, `homeDistrict`, `experience`, `department`, `sex`, `image`) VALUES
(1, 4, 'Sayem', 'Jahangirnagar University', '0170349', 'Graphics', 'Dinajpur', 'fresher', '', 'male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`, `created`) VALUES
(1, 'Sagar', 'shuvashishpaul64@gmail.com', '01710684220', 'Hello', '2019-10-18 20:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `created`) VALUES
(1, 'The website is going to be launched soon', '2019-10-21 01:10:27'),
(2, 'Another announcement', '2019-10-21 01:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter`
--

CREATE TABLE `recruiter` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `phone` varchar(512) NOT NULL,
  `company` varchar(512) NOT NULL,
  `designation` varchar(512) NOT NULL,
  `university` varchar(512) DEFAULT NULL,
  `image` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiter`
--

INSERT INTO `recruiter` (`id`, `userId`, `name`, `phone`, `company`, `designation`, `university`, `image`) VALUES
(1, 3, 'Shuvashish Paul Sagar', '01710684220', 'Techavancer', 'Software Engineer', 'JU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(512) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created`) VALUES
(1, 'shuvashishpaul64@gmail.com', '2019-10-18 18:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` text,
  `paymentMethod` varchar(512) NOT NULL,
  `paymentNo` varchar(512) DEFAULT NULL,
  `token` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `type`, `status`, `paymentMethod`, `paymentNo`, `token`, `created`, `updated`) VALUES
(3, 'shuvashishpaul64@gmail.com', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', 'recruiter', 'User confirmed', 'bkash', '89', '28a78149c93a55e5', '2019-10-12 07:43:14', '2019-10-20 23:07:55'),
(4, 'asmsayem2@gmail.com', '5eb69a2775391c74d60e17382a4ce4578a78ccaa', 'recruiter', 'User applied', 'bkash', '01750553549', '1e2f42f3c2455d55', '2019-10-21 18:11:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `founder`
--
ALTER TABLE `founder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `honorarium`
--
ALTER TABLE `honorarium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiter`
--
ALTER TABLE `recruiter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `founder`
--
ALTER TABLE `founder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `honorarium`
--
ALTER TABLE `honorarium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recruiter`
--
ALTER TABLE `recruiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
