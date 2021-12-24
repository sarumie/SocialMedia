-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 02:24 AM
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
(7, '6', 15, 12, '2021-12-24 06:42:52', 'oke mang\r\n');

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
(37, 12, 15, '1', '2021-12-24 07:06:48.000000');

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
(10, 15, 15, 10, '2021-12-23 21:09:11');

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
(4, 13, 'dasdad', '', '2021-11-22 20:48:19', 0, 0, 0),
(5, 13, 'asd', 'POSTING_971759.jpg', '2021-11-22 20:51:48', 0, 0, 0),
(6, 12, 'test', 'POSTING_60792.jpg', '2021-11-23 07:05:42', 0, 1, 0),
(7, 12, '', '', '2021-11-23 08:33:44', 0, 0, 0),
(8, 15, 'aaaaa', '', '2021-12-10 17:05:17', 0, 1, 0),
(9, 15, 'gambar', 'POSTING_644902.jpg', '2021-12-10 17:05:48', 0, 1, 0),
(10, 15, 'Halo gan', '', '2021-12-23 12:47:20', 1, 3, 0);

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
  `level` varchar(10) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `cover` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `email`, `fullname`, `username`, `password`, `level`, `foto`, `cover`) VALUES
(12, 'firman@gmail.com', 'Firmansyah Purwanto', 'fir11', '202cb962ac59075b964b07152d234b70', 'user', 'default.jpg', 'default_cover.jpg'),
(13, 'kurniawan@gmail.com', 'Abdulah Kurniawan', 'iostream', '698d51a19d8a121ce581499d7b701668', 'admin', 'default.jpg', 'default_cover.jpg\r\n'),
(14, 'reee@gmail.com', 'Anjayani', 'Jefel_22', '098f6bcd4621d373cade4e832627b4f6', 'user', 'default.jpg', 'default_cover.jpg'),
(15, 'jekun@gmail.com', 'Jeremy Kunta', 'Jekun', '698d51a19d8a121ce581499d7b701668', 'user', 'PROFILE_359381.jpg', 'COVER_770953.jpg');

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
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `idfollow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `idlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `idtweet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
