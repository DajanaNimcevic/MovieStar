-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 11:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lengthMin` int(11) NOT NULL,
  `trailer_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imdb_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `title`, `description`, `lengthMin`, `trailer_link`, `picture`, `imdb_link`) VALUES
(4, 'Avengers: Endgame', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos\' actions and restore balance to the universe.', 180, 'https://www.youtube.com/embed/TcMBFSGVi1c', 'avengers.jpg', 'https://www.imdb.com/title/tt4154796/?ref_=nv_sr_srsg_0'),
(5, 'Thor: Love and Thunder', 'The sequel to Thor: Ragnarok and the fourth movie in the Thor saga.', 165, 'https://www.youtube.com/embed/ue80QwXMRHg', 'thor.jpg', 'https://www.imdb.com/title/tt10648342/?ref_=nv_sr_srsg_0'),
(6, 'Joker', 'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker.', 122, 'https://www.youtube.com/embed/zAGVQLHvwOY', 'joker.jpg', 'https://www.imdb.com/title/tt7286456/?ref_=nv_sr_srsg_0'),
(7, 'Wonder Woman 1984', 'When a pilot crashes and tells of conflict in the outside world, Diana, an Amazonian warrior in training, leaves home to fight a war, discovering her full powers and true destiny.', 141, 'https://www.youtube.com/embed/XW2E2Fnh52w', 'wonderwoman.jpg', 'https://www.imdb.com/title/tt7126948/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=ea4e08e1-c8a3-47b5-ac3a-75026647c16e&pf_rd_r=GADMH26XQSZCZSDRTHBP&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=moviemeter&ref_=chtmvm_tt_3'),
(8, 'The Irishman', 'Frank \"The Irishman\" Sheeran is a man with a lot on his mind. The former labor union high official and hitman, learned to kill serving in Italy during the Second World War. He now looks back on his life and the hits that defined his mob career, maintaining connections with the Bufalino crime family.', 120, 'https://www.youtube.com/embed/RS3aHkkfuEI', 'irishman.jpg', 'https://www.imdb.com/title/tt1302006/');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_screening` int(11) NOT NULL,
  `id_seat` int(11) NOT NULL,
  `res_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_user`, `id_screening`, `id_seat`, `res_date`) VALUES
(1, 34, 12, 28, '2020-08-29 14:01:16'),
(2, 34, 12, 30, '2020-08-29 14:01:17'),
(3, 34, 12, 29, '2020-08-29 14:01:17'),
(4, 34, 12, 37, '2020-08-29 14:01:17'),
(10, 34, 20, 29, '2020-08-29 14:02:31'),
(11, 34, 20, 13, '2020-08-29 14:02:32'),
(12, 34, 20, 14, '2020-08-29 14:02:32'),
(13, 34, 20, 22, '2020-08-29 14:02:32'),
(14, 34, 20, 21, '2020-08-29 14:02:33'),
(15, 34, 20, 30, '2020-08-29 14:02:33'),
(24, 29, 25, 3, '2020-08-29 21:25:09'),
(25, 29, 25, 12, '2020-08-29 21:25:09'),
(27, 29, 25, 15, '2020-08-29 21:25:10'),
(29, 29, 25, 6, '2020-08-29 21:25:11'),
(30, 29, 25, 5, '2020-08-29 21:25:11'),
(31, 29, 25, 4, '2020-08-29 21:25:12'),
(36, 29, 24, 1, '2020-08-29 21:26:31'),
(37, 29, 24, 2, '2020-08-29 21:26:32'),
(38, 29, 24, 11, '2020-08-29 21:26:32'),
(39, 29, 24, 10, '2020-08-29 21:26:32'),
(40, 29, 24, 18, '2020-08-29 21:26:33'),
(41, 29, 24, 19, '2020-08-29 21:26:33'),
(42, 29, 24, 27, '2020-08-29 21:26:33'),
(43, 29, 24, 26, '2020-08-29 21:26:34'),
(44, 29, 24, 34, '2020-08-29 21:26:34'),
(45, 29, 24, 35, '2020-08-29 21:26:34'),
(46, 29, 24, 43, '2020-08-29 21:26:35'),
(47, 29, 24, 42, '2020-08-29 21:26:35'),
(52, 29, 32, 1, '2020-08-30 09:28:30'),
(53, 29, 32, 2, '2020-08-30 09:28:30'),
(54, 29, 32, 11, '2020-08-30 09:28:31'),
(55, 29, 32, 10, '2020-08-30 09:28:31'),
(56, 29, 28, 3, '2020-08-30 09:37:54'),
(57, 29, 28, 4, '2020-08-30 09:37:54'),
(58, 29, 28, 6, '2020-08-30 09:37:54'),
(59, 29, 28, 5, '2020-08-30 09:37:55'),
(60, 29, 28, 12, '2020-08-30 09:37:56'),
(61, 29, 28, 13, '2020-08-30 09:37:56'),
(62, 29, 28, 14, '2020-08-30 09:37:56'),
(63, 29, 28, 15, '2020-08-30 09:37:57'),
(64, 29, 29, 8, '2020-08-30 09:38:11'),
(65, 29, 29, 9, '2020-08-30 09:38:12'),
(66, 29, 29, 6, '2020-08-30 09:38:12'),
(67, 29, 30, 44, '2020-08-30 09:38:20'),
(69, 29, 30, 45, '2020-08-30 09:38:22'),
(70, 29, 27, 36, '2020-08-30 09:39:22'),
(71, 29, 27, 28, '2020-08-30 09:39:23'),
(72, 29, 27, 29, '2020-08-30 09:39:23'),
(73, 29, 27, 30, '2020-08-30 09:39:23'),
(74, 29, 27, 31, '2020-08-30 09:39:24'),
(75, 29, 27, 39, '2020-08-30 09:39:24'),
(76, 29, 27, 38, '2020-08-30 09:39:24'),
(77, 29, 27, 37, '2020-08-30 09:39:24'),
(78, 29, 27, 44, '2020-08-30 09:39:25'),
(79, 29, 27, 45, '2020-08-30 09:39:25'),
(80, 29, 27, 46, '2020-08-30 09:39:25'),
(81, 29, 27, 47, '2020-08-30 09:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `id_screening` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `start` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`id_screening`, `id_movie`, `start`) VALUES
(6, 4, '2019-12-21 20:00:00'),
(8, 6, '2019-12-22 20:00:00'),
(9, 7, '2019-12-22 22:00:00'),
(10, 4, '2019-12-23 23:55:00'),
(11, 7, '2019-12-19 00:00:00'),
(12, 5, '2019-12-29 00:30:00'),
(19, 6, '2019-12-20 11:00:00'),
(20, 7, '2020-07-30 21:15:00'),
(23, 6, '2020-08-29 20:26:00'),
(24, 8, '2020-08-31 20:29:00'),
(25, 6, '2020-08-30 15:28:00'),
(26, 4, '2020-09-04 00:00:00'),
(27, 5, '2020-09-03 14:30:00'),
(28, 6, '2020-09-05 17:45:00'),
(29, 7, '2020-09-05 12:00:00'),
(30, 8, '2020-09-13 23:30:00'),
(31, 6, '2020-08-30 15:40:00'),
(32, 4, '2020-08-30 13:29:00'),
(33, 5, '2020-08-30 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id_seat` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id_seat`, `row`, `number`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 2, 1),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 2, 5),
(15, 2, 6),
(16, 2, 7),
(17, 2, 8),
(18, 3, 1),
(19, 3, 2),
(20, 3, 3),
(21, 3, 4),
(22, 3, 5),
(23, 3, 6),
(24, 3, 7),
(25, 3, 8),
(26, 4, 1),
(27, 4, 2),
(28, 4, 3),
(29, 4, 4),
(30, 4, 5),
(31, 4, 6),
(32, 4, 7),
(33, 4, 8),
(34, 5, 1),
(35, 5, 2),
(36, 5, 3),
(37, 5, 4),
(38, 5, 5),
(39, 5, 6),
(40, 5, 7),
(41, 5, 8),
(42, 6, 1),
(43, 6, 2),
(44, 6, 3),
(45, 6, 4),
(46, 6, 5),
(47, 6, 6),
(48, 6, 7),
(49, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `admin`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 1),
(20, 'proba', 'proba', 'proba@gmail.com', 0),
(21, 'radi', 'kompanjon123', 'jessss@gmail.com', 0),
(26, 'najnovije', '$2y$10$mQpCLUZMHNR7tV80TK6yxuW3mxjBvJPtqYbN.CUtQBpHdg7/ZvVbe', 'najnovije@gmail.com', 0),
(27, 'dajana', '$2y$10$7JTFJEFdD6PvanAXw/D27u0yJ2AEVnoT/j1cuqcAFR5OAdXOsNWny', 'dajana@gmail.com', 0),
(29, 'daja', '$2y$10$gpIwmzpXQXipIxWTo0s5EuXbKjErzPgfBFOCKYPb4lShxjPdv4Kb2', 'daja@gmail.com', 1),
(30, 'probaaaaa', '$2y$10$3QnF/oe2OMrhjOozP6CSMO23IJBPoji52bRAtArRMWTxLWD57C2Na', 'd@gmail.com', 0),
(31, 'dajaaa', '$2y$10$oGxQtw4hfsHxKSFJ88oNae1hKQ8oKFpLV.af4hYw4k68InvRpp.32', 'proba@gmail.com', 0),
(32, 'proba', '$2y$10$EsiH9AALKqK/7EYoWeLyBO9SdvqiFW07OXQxb4/Jth6yFvahFQcPG', 'milosjovaniczaki@gmail.com', 0),
(33, 'asdasd', '$2y$10$HzXWkWyAaTM3YNHmcXlyEeHkibPQC1xcLEslP5JFRl0xTT.FN9ckS', 'rp@mgmas.com', 0),
(34, 'bandox', '$2y$10$8/.K5Dz.HGfh3pSagar0IOu/e/.ZST2.4OEQmTHPHVg7Dg/F.SGxG', 'rp@gmail.com', 0),
(35, 'probicccc', '$2y$10$8Am18wvfqvyIQAnwPTlAgelwtnIM5tL5FFr9BlqzLjRHSEYrPPBe.', 'probicc@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `FK_id_korisnik` (`id_user`),
  ADD KEY `FK_id_screening` (`id_screening`),
  ADD KEY `id_seat` (`id_seat`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`id_screening`),
  ADD KEY `FK_id_movie` (`id_movie`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id_seat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `id_screening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id_seat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_id_korisnik` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_id_screening` FOREIGN KEY (`id_screening`) REFERENCES `screening` (`id_screening`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `screening`
--
ALTER TABLE `screening`
  ADD CONSTRAINT `FK_id_movie` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
