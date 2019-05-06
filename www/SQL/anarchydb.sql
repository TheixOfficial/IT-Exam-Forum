-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 03:35 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anarchydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lastposter` varchar(255) NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `topics` int(11) NOT NULL,
  `replies` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `name`, `lastposter`, `lastpostdate`, `topics`, `replies`) VALUES
(1, 'Programming', 'Pete', 1557106410, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) unsigned NOT NULL,
  `topicid` int(11) unsigned DEFAULT NULL,
  `message` text NOT NULL,
  `subject` text NOT NULL,
  `poster` text NOT NULL,
  `date` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `topicid`, `message`, `subject`, `poster`, `date`) VALUES
(1, 15, 'Please make sure you''re arraylist is the right length, if it isn''t and you try to access an index larger than the arraylist, you get errors.', 'Make sure it''s the right length', 'Flemming', 1557106136),
(2, 15, 'Thank you Flemming, you really helped me out with this one. Apparently i was trying to get the value of indexes that was outside of the arraylist size.', 'It Worked', 'Pete', 1557106410);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) unsigned NOT NULL,
  `forumid` int(11) unsigned DEFAULT NULL,
  `message` text NOT NULL,
  `subject` text NOT NULL,
  `poster` text NOT NULL,
  `date` int(11) NOT NULL,
  `lastposter` varchar(200) NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `replies` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `forumid`, `message`, `subject`, `poster`, `date`, `lastposter`, `lastpostdate`, `replies`) VALUES
(15, 1, 'I need help with my arraylist in java, it tells me I''ve gotten an index array out of bounds exception. Please help what do I do.', 'Java problem with arraylist', 'Pete', 1557105903, 'Pete', 1557106410, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `screenname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `screenname`, `firstname`, `lastname`, `email`, `pwd`) VALUES
(1, 'Theix', 'Theix', 'Emil', 'Lind', 'emillind8@gmail.com', '$2y$10$BLqfWkI0CKYkJn5afTqEA.BtmGRYNb.PKOARP1YFGzoV9gsjurcj.'),
(2, 'Test', 'Test', 'Test', 'Test', 'Test@Test.te', '$2y$10$0i90TuxL8irzLc32HTcjm.gJYdYcErlLwVmE5jl5M0yvtdSGrHCc6'),
(3, 'Pete1568', 'Pete', 'Pete', 'Petersen', 'PetePetersen@gmail.com', '$2y$10$u3Fbd/XaUaeeExy/5EfWa.X2XHvjANqzoEbxDGH7Gw87f/.nfKHVu'),
(4, 'Flemming', 'Flemming', 'Flemming', 'Jensen', 'Flemming@gmail.com', '$2y$10$Brm9UB6ZRJMUBh1a0rZ5FOkvdXZxzNPX7jCbSkVBSUqTsZnrmQMni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
