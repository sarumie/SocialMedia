-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 09:04 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `idtweet` varchar(120) CHARACTER SET latin1 NOT NULL,
  `iduser` int(11) NOT NULL,
  `toiduser` int(11) NOT NULL,
  `dateComment` datetime NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `idtweet`, `iduser`, `toiduser`, `dateComment`, `comment`) VALUES
(2, '10', 15, 15, '2021-12-23 20:11:12', 'iya bang'),
(3, '9', 15, 15, '2021-12-23 20:15:09', 'Gws mbak'),
(4, '8', 15, 15, '2021-12-23 20:15:14', 'oke'),
(5, '10', 15, 15, '2021-12-23 20:29:48', 'Siap bang'),
(7, '6', 15, 12, '2021-12-24 06:42:52', 'oke mang\r\n'),
(8, '8', 13, 15, '2021-12-24 08:45:45', 'bang'),
(9, '13', 13, 13, '2021-12-24 08:47:03', 'halo'),
(10, '12', 13, 13, '2021-12-24 08:48:34', 'asdsadasda'),
(11, '10', 13, 15, '2021-12-26 18:26:13', 'test'),
(12, '10', 13, 15, '2021-12-26 18:44:27', 'sd'),
(13, '12', 13, 13, '2021-12-26 19:15:05', 'halo'),
(14, '12', 13, 13, '2021-12-28 13:43:34', 'bang\r\n'),
(15, '7', 13, 12, '2021-12-30 19:43:03', 'test'),
(16, '16', 13, 13, '2022-03-09 10:30:16', 'Test'),
(17, '15', 13, 13, '2022-03-23 14:26:00', 'bang\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `idfollow` int(11) NOT NULL,
  `fromiduser` int(11) NOT NULL,
  `toiduser` int(11) NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL,
  `dateFollow` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`idfollow`, `fromiduser`, `toiduser`, `status`, `dateFollow`) VALUES
(46, 16, 13, '1', '2022-03-09 10:32:25.000000'),
(47, 15, 13, '1', '2022-03-09 10:32:40.000000');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `idlike` int(11) NOT NULL,
  `fromiduser` int(11) NOT NULL,
  `toiduser` int(11) NOT NULL,
  `idtweet` int(11) NOT NULL,
  `dateLikes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`idlike`, `fromiduser`, `toiduser`, `idtweet`, `dateLikes`) VALUES
(10, 15, 15, 10, '2021-12-23 21:09:11'),
(11, 13, 13, 12, '2021-12-24 08:48:39'),
(12, 13, 13, 4, '2021-12-27 14:57:15'),
(15, 13, 12, 7, '2022-01-02 11:38:46'),
(16, 13, 13, 16, '2022-03-09 10:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `idtweet` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tw` text CHARACTER SET latin1 NOT NULL,
  `postImg` varchar(120) CHARACTER SET latin1 NOT NULL,
  `dateTw` datetime NOT NULL,
  `totalLike` int(11) NOT NULL,
  `totalComment` int(11) NOT NULL,
  `totalShare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`idtweet`, `iduser`, `tw`, `postImg`, `dateTw`, `totalLike`, `totalComment`, `totalShare`) VALUES
(1, 13, 'Okekan', '', '2021-11-22 10:03:12', 0, 0, 0),
(2, 13, '#share', '', '2021-11-22 20:39:31', 0, 0, 0),
(3, 13, 'test', 'POSTING_288101.jpg', '2021-11-22 20:46:23', 0, 0, 0),
(4, 13, 'dasdad', '', '2021-11-22 20:48:19', 1, 0, 0),
(5, 13, 'asd', 'POSTING_971759.jpg', '2021-11-22 20:51:48', 0, 0, 0),
(6, 12, 'test', 'POSTING_60792.jpg', '2021-11-23 07:05:42', 0, 1, 0),
(7, 12, '', '', '2021-11-23 08:33:44', 1, 1, 0),
(8, 15, 'aaaaa', '', '2021-12-10 17:05:17', 0, 2, 0),
(9, 15, 'gambar', 'POSTING_644902.jpg', '2021-12-10 17:05:48', 0, 1, 0),
(10, 15, 'Halo gan', '', '2021-12-23 12:47:20', 1, 5, 0),
(11, 13, 'Tes gan', '', '2021-12-24 08:45:54', 0, 0, 0),
(12, 13, 'Jjjj', 'POSTING_827366.png', '2021-12-24 08:46:30', 1, 3, 0),
(13, 13, 'Testing', 'POSTING_157192.jpeg', '2021-12-24 08:46:52', 0, 1, 0),
(14, 13, 'test', '', '2021-12-30 19:41:27', 0, 0, 0),
(15, 13, 'test', 'POSTING_129666.jpg', '2021-12-30 19:45:44', 0, 1, 0),
(16, 13, 'halo kak', '', '2022-01-03 10:26:21', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `cover` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `email`, `fullname`, `username`, `password`, `foto`, `cover`) VALUES
(12, 'firman@gmail.com', 'Firmansyah Purwanto', 'fir11', '202cb962ac59075b964b07152d234b70', 'default.jpg', 'default_cover.jpg'),
(13, 'kurniawan@gmail.com', 'Abdulah Kurniawan', 'iostream', '698d51a19d8a121ce581499d7b701668', 'PROFILE_142464.jpg', 'COVER_712360.jpg'),
(14, 'reee@gmail.com', 'Anjayani', 'Jefel_22', '098f6bcd4621d373cade4e832627b4f6', 'default.jpg', 'default_cover.jpg'),
(15, 'jekun@gmail.com', 'Jeremy Kunta', 'Jekun', '698d51a19d8a121ce581499d7b701668', 'PROFILE_359381.jpg', 'COVER_770953.jpg'),
(16, 'hermawankunto@gmail.com', 'Hermawanto Kunto', 'WanTo', '698d51a19d8a121ce581499d7b701668', 'default.jpg', 'default_cover.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`idfollow`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`idlike`);

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`idtweet`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `idfollow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `idlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `idtweet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
