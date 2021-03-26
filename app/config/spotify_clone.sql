-- phpMyAdmin SQL Dump
-- version 5.1.0-rc2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2021 at 12:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `audios`
--

CREATE TABLE `audios` (
  `ID` int(60) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `album` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `thumbnail` text COLLATE utf8_turkish_ci NOT NULL,
  `url` text COLLATE utf8_turkish_ci NOT NULL,
  `yt_id` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `viewed_times` int(60) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `audios`
--

INSERT INTO `audios` (`ID`, `title`, `album`, `thumbnail`, `url`, `yt_id`, `viewed_times`) VALUES
(13, 'Imagine Dragons - Demons', 'ImagineDragonsVEVO', 'https://i.ytimg.com/vi/mWRsgZuwf_8/hqdefault.jpg', 'https://www.youtube.com/watch?v=mWRsgZuwf_8', 'mWRsgZuwf_8', 0),
(14, 'Alec Benjamin - If We Have Each Other', 'Alec Benjamin', 'https://i.ytimg.com/vi/tscMSXk_jaQ/hqdefault.jpg', 'https://youtu.be/tscMSXk_jaQ', 'tscMSXk_jaQ', 0),
(15, 'If I Killed Someone For You', 'Alec Benjamin', 'https://i.ytimg.com/vi/Leiyfqe28tM/hqdefault.jpg', 'https://www.youtube.com/watch?v=Leiyfqe28tM', 'Leiyfqe28tM', 0),
(16, 'Orkhan Zeynalli ft. Roya Miriyeva - AiD Vecsiz', 'Orkhan Zeynalli', 'https://i.ytimg.com/vi/h1M4_cSAT_Y/hqdefault.jpg', 'https://www.youtube.com/watch?v=h1M4_cSAT_Y', 'h1M4_cSAT_Y', 0),
(17, 'Alec Benjamin - Let Me Down Slowly', 'Alec Benjamin', 'https://i.ytimg.com/vi/50VNCymT-Cs/hqdefault.jpg', 'https://www.youtube.com/watch?v=50VNCymT-Cs', '50VNCymT-Cs', 0),
(18, 'Lauv - Modern Loneliness', 'Lauv', 'https://i.ytimg.com/vi/bDidwMxir4o/hqdefault.jpg', 'https://youtu.be/bDidwMxir4o', 'bDidwMxir4o', 0),
(19, 'OneRepublic - Counting Stars', 'OneRepublicVEVO', 'https://i.ytimg.com/vi/hT_nvWreIhg/hqdefault.jpg', 'https://www.youtube.com/watch?v=hT_nvWreIhg&list=RDtscMSXk_jaQ&index=19', 'hT_nvWreIhg', 0),
(20, 'Alec Benjamin - Boy In The Bubble', 'Alec Benjamin', 'https://i.ytimg.com/vi/8WvKFL_LIB8/hqdefault.jpg', 'https://youtu.be/8WvKFL_LIB8', '8WvKFL_LIB8', 0),
(21, 'KOMÃœNÄ°ST VS NAZÄ° - PorÃ§ay Rap SavaÅŸlarÄ±', 'PorÃ§ay', 'https://i.ytimg.com/vi/1x0GqPCjfqE/hqdefault.jpg', 'https://youtu.be/1x0GqPCjfqE', '1x0GqPCjfqE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `playlist_id` int(60) NOT NULL,
  `ID` int(60) NOT NULL,
  `title` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `audios` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`playlist_id`, `ID`, `title`, `audios`) VALUES
(1, 13, 'nyama\'s playlist', NULL),
(2, 11, 'testuser\'s playlist', '{\"1\": \"mWRsgZuwf_8\", \"3\": \"tscMSXk_jaQ\", \"4\": \"Leiyfqe28tM\"}'),
(3, 9, 'askerased\'s playlist', '{\"2\": \"Leiyfqe28tM\", \"3\": \"8WvKFL_LIB8\", \"4\": \"hT_nvWreIhg\", \"5\": \"bDidwMxir4o\", \"6\": \"50VNCymT-Cs\"}'),
(4, 9, 'NewPlaylistForAskerased', '[\"mWRsgZuwf_8\"]'),
(5, 9, 'Miguel O\'hara', '[\"50VNCymT-Cs\", \"mWRsgZuwf_8\", \"Leiyfqe28tM\", \"1x0GqPCjfqE\"]'),
(6, 9, 'myemptylist', '[\"mWRsgZuwf_8\", \"h1M4_cSAT_Y\", \"hT_nvWreIhg\"]'),
(7, 11, 'My new ooklalist', '[\"8WvKFL_LIB8\", \"50VNCymT-Cs\", \"Leiyfqe28tM\"]'),
(8, 9, 'yeahlist', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(60) NOT NULL,
  `username` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `password`, `is_admin`) VALUES
(5, 'OldBoi65', 'lemmecheckyou@mail.ru', '$2y$10$8vYr90dYvhFcz69WRILSNuG9kXuRwohkTdf/uVDFv4MQazkRaEiA2', 0),
(9, 'askerased', 'askedwhoami@gmail.com', '$2y$10$HnYQVoVv7/LPj/T/GXzzAuX1AZTRt40cSRpxMs.QNbOpvYcGDZY/u', 1),
(10, 'aytacali', 'aytacaliyeva133@gmail.com', '$2y$10$q5mLhhXz1DH9F2efe0WR/eQy9gyXAOeiPZMXahopZAJZKPdd.YA1q', 0),
(11, 'testuser', 'testuser@gmail.com', '$2y$10$q6bzQnBTkDyCpOCRbeKreei38RWW37/XtKYtieSgCK3RTL1P2DaVO', 0),
(12, 'mymymy', 'mymymy@gmail.com', '$2y$10$.reeXgIPw1a3eWfIzNamb.Iom1QuKviM5/T6hCm8oUF84.Z0GoLuC', 0),
(13, 'nyama', 'nyamma@gmail.com', '$2y$10$kP3uHhESRmyRpmCRw76KT.Hkvc8BKCJS1cFvDjbGLlR8EbWQ561mi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`playlist_id`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audios`
--
ALTER TABLE `audios`
  MODIFY `ID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `playlist_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
