-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Lug 27, 2017 alle 08:37
-- Versione del server: 5.5.55-0+deb8u1
-- PHP Version: 7.0.19-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `S4116422`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Admin`
--

INSERT INTO `Admin` (`username`, `email`, `password`) VALUES
  ('admin', 'admin@gmail.com', '$2y$10$DnHSD3WuOXrL0Ma4Yhzd2uqK6mBYNIO4tvuynOHzfdGx67O.WQlQu'),
  ('w', 'root@g.d', '$2y$10$ga8S0vfgCLuZdRIs4wxcn.Z6o4DrkXcAt/Auyj8WNb1huWiSP.dHG'),
  ('aa', 'f@h.g', '$2y$10$yQPv2aHhteRRVKaELPHZDeKK4tuJ9dT0RwprQyFj8Qejy88gaq5/K'),
  ('ww', 'root@h.f', '$2y$10$7rjtgEUsuucySPdUowTKDeIeD1ZfE4nPmloLaYDl3fEEHmdPq0/D2'),
  ('ww', 'root@g.h', '$2y$10$lehccb02KMDSWeSUmeuxfeWN7LBUlmBwjnOtGOlTI6vDO7lfLpIS.'),
  ('ww', 'a@b.n', '$2y$10$50FVIrdGCOysB0SZGAbXSe0/h4exhK4C8944kPsRhAquW9gF7HMyi'),
  ('ww', 'a@b.n', '$2y$10$JQSehSzFDn.CFrR.7FpKueIJ.CmKIU4883TMh3L/4A1z1290gTt6C'),
  ('wwww', 'root@g.h', '$2y$10$qm4Hl1A7TAkk0VCS/swvd.8ZrL/PhxqKrZVaj9mHcsH.ygop0DTNq'),
  ('wiera', 'wieramoroz@gmail.com', '$2y$10$QMaoeSWb0Fy.Sco2SYJHBe6p03HA16exfgRxcdZ4cIw8kguTVFIAK'),
  ('q', 'root@g', '$2y$10$AhijsyWvzZXoe4.N9C27ruOoe4g104ELMdaojZSENQabmW667jB9G'),
  ('q', 'root@h.h', '$2y$10$tSACy6s8Y.WMkehiVwVOquNh64FY1z3I.7fAd65A.l26Qh.UwNN9y'),
  ('qq', 'root@f.h', '$2y$10$DgknFJh29bbVBGzgIZMdhuTrRn1Cu/Y3A5CbXA8sF1dojI1w7c3ie'),
  ('ee', 'root@h.y', '$2y$10$WHFX2df2Ti0SIfNJvByOnerwZ8rmul8WFK2zfI34/DSRDgjz21RCa'),
  ('aa', 'a@j.y', '$2y$10$1IQ5aY8bvH2MCW3/V3BH9uRZ3ltbzpz8jCcIsxYaqEmkW1p2v/qQu'),
  ('faber', 'faber.admin@mail.it', '$2y$10$nJWNKUu.CG9m9WLV6BsNRekwQlwmT3myL4hRTGfWs3fJCuqIg0QJS');

-- --------------------------------------------------------

--
-- Struttura della tabella `Events`
--

CREATE TABLE IF NOT EXISTS `Events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET ascii NOT NULL,
  `description` varchar(300) CHARACTER SET ascii NOT NULL,
  `day` date NOT NULL,
  `address` varchar(100) CHARACTER SET ascii NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `owner` varchar(40) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Events`
--

INSERT INTO `Events` (`id`, `name`, `description`, `day`, `address`, `lat`, `lon`, `owner`) VALUES
  (11, 'Mamma', 'molto bello', '2017-07-23', 'viale carlo canepa 5 genova', 44.4268883, 8.8507098, 'mamma'),
  (12, 'pippo', 'bello', '2017-07-26', 'genova via xx settembre', 44.4059497, 8.9394586, ''),
  (5, 'pippo', 'pippo', '2017-07-21', 'via dodecaneso genova', 44.4020157, 8.9699217, 'luca'),
  (6, 'pippo', 'pippo', '2017-07-20', 'genova', 44.4056499, 8.946256, 'luca'),
  (7, 'pippo', 'pippo', '2017-07-21', 'genova via brigate partigiane', 44.3986179, 8.9448773, 'pippo'),
  (8, 'pippo', 'pippo', '2017-07-22', 'genova via brigate partigiane', 44.3986179, 8.9448773, 'pippo'),
  (9, 'Party dalla mamma', 'Molto bello! ma davvero', '2017-07-20', 'Viale Carlo canepa Genova', 44.4270998, 8.8506773, 'Faber'),
  (13, 'pippo', 'pippo', '2017-07-29', 'genova via xx settembre', 44.4059497, 8.9394586, 'owner'),
  (14, 'pippo2', 'pippo', '2017-07-29', 'genova via san vincenzo', 44.4070826, 8.9428478, 'owner'),
  (15, 'ciao', 'bellissimo', '2017-07-28', 'lungo mare canepa genova', 44.4088546, 8.8917598, 'owner'),
  (16, 'raccoon', 'raccoon', '2017-07-29', 'genova via dodecaneso', 44.4020157, 8.9699217, 'faber'),
  (17, 's', 'pippo', '2017-07-27', 'genova', 44.4056499, 8.946256, 'faber'),
  (18, 'aaa', 'prova', '2017-07-26', 'genova', 44.4056499, 8.946256, 'faber'),
  (19, 'prova', 'pippo', '2017-07-26', 'genova via brigate partigiane', 44.3986179, 8.9448773, 'faber'),
  (20, 'proca', 'prova', '2017-07-27', 'genova via di francia', 44.4093188, 8.9009834, ''),
  (21, 'pippo', 'milano', '2017-07-25', 'milano', 45.4642035, 9.189982, ''),
  (22, 'torino', 'torino', '2017-07-28', 'torino', 45.0703393, 7.686864, ''),
  (23, 'marco', 'pegli', '2017-07-29', 'pegli genova', 44.4285278, 8.8114707, ''),
  (24, 'Mamma', 'pegli', '2017-07-28', 'genova pegli', 44.4285278, 8.8114707, ''),
  (26, 'pippo', 'pippo', '2017-07-29', 'milano centrale', 45.4858877, 9.2042827, 'faber'),
  (27, 'PROVA immaginw', 'prova immagine', '2017-07-28', 'genova via dodecaneso', 44.4020157, 8.9699217, 'faber');

-- --------------------------------------------------------

--
-- Struttura della tabella `Followed`
--

CREATE TABLE IF NOT EXISTS `Followed` (
  `id` int(11) NOT NULL,
  `username` varchar(40) CHARACTER SET ascii NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Followed`
--

INSERT INTO `Followed` (`id`, `username`) VALUES
  (1, 'faber'),
  (2, 'faber'),
  (3, 'faber'),
  (4, 'faber'),
  (9, 'faber'),
  (12, 'faber'),
  (13, 'faber'),
  (14, 'faber'),
  (16, 'faber'),
  (17, 'faber'),
  (18, 'faber'),
  (19, 'faber'),
  (20, 'faber'),
  (20, 'pippo'),
  (27, 'faber'),
  (1026, 'faber');

-- --------------------------------------------------------

--
-- Struttura della tabella `Profiles`
--

CREATE TABLE IF NOT EXISTS `Profiles` (
  `username` varchar(40) CHARACTER SET ascii NOT NULL,
  `name` varchar(40) CHARACTER SET ascii DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `email` varchar(40) CHARACTER SET ascii NOT NULL,
  `residence` varchar(40) CHARACTER SET ascii DEFAULT NULL,
  `link` varchar(128) CHARACTER SET ascii DEFAULT NULL,
  `description` varchar(255) CHARACTER SET ascii DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Profiles`
--

INSERT INTO `Profiles` (`username`, `name`, `surname`, `email`, `residence`, `link`, `description`) VALUES
  ('faber', NULL, NULL, 'faber@mail.it', NULL, NULL, NULL),
  ('a', NULL, NULL, 'a@mail.it', NULL, NULL, NULL),
  ('poi', NULL, NULL, 'poi@mail.it', NULL, NULL, NULL),
  ('luca', '', '', 'l@mail.it', '', '', ''),
  ('b', 'b', 'b', 'b@mail.it', 'genova', 'http://www.google.it', 'ciao'),
  ('h', '', '', 'h@mail.it', '', '', ''),
  ('r', 'r', 'r', 'r@mail.it', 'r', 'http://www.google.it', 'r'),
  ('lollo', 'lorenzo', 'lorenzi', 'lollo@mail.it', 'genova', 'http://www.google.it', 'Mi piacciono le feste!!'),
  ('ciao', 'ciao', 'ciao', 'ciao@mail.it', 'ciao', 'http://www.google.it', 'ciao ciao bello');

-- --------------------------------------------------------

--
-- Struttura della tabella `Signaled`
--

CREATE TABLE IF NOT EXISTS `Signaled` (
  `id` int(11) NOT NULL,
  `username` varchar(40) CHARACTER SET ascii NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Signaled`
--

INSERT INTO `Signaled` (`id`, `username`) VALUES
  (1, 'faber'),
  (2, 'faber'),
  (12, 'faber'),
  (14, 'faber'),
  (15, 'faber'),
  (16, 'faber'),
  (27, 'faber'),
  (1023, 'richard');

-- --------------------------------------------------------

--
-- Struttura della tabella `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `username` varchar(40) CHARACTER SET ascii NOT NULL,
  `password` varchar(50) CHARACTER SET ascii NOT NULL,
  `banned` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Users`
--

INSERT INTO `Users` (`username`, `password`, `banned`) VALUES
  ('faber', '$2y$10$YpDil4NIFT7tct2jJU13hOkL5NuSAeiLuTvvQ6AOuAK', b'0'),
  ('e', '$2y$10$gBcDSLDO9iLmnd8pjOcXWum7f4TewD90xE1EhmQfLJs', b'0'),
  ('mm', '$2y$10$ghqvKlhnKKG3w.PuMt6lremYm4VB79IsmSEpAIgpWIw', b'0'),
  ('pippo', '$2y$10$Ard8ottRnj96Gh.aSiaW9.p8CLzpuSmCk0OekqLuE20', b'0'),
  ('pluto', '$2y$10$i6XmmZ1pB4W7HmtFFiIshuXmeLJNfsZcZDqGsxSUWFX', b'0'),
  ('pluto2', '$2y$10$2OUJK82vwukgjYSpUpcOgel3ubvQY3LkWejFaptQCeA', b'0'),
  ('aaa', '$2y$10$unaKfqu2bFh.va.Foj3Ncuhf33OPCeAlNNCHa8UCmHW', b'0'),
  ('ppp', '$2y$10$xEgyN2Rbs/HoL8.c0nOqIubzXt3bb8p0PJMEqwQrI1T', b'0'),
  ('qqq', '$2y$10$BT63H5jRqAvNbT.RkXj/KeCHbZIdTfAHICCv.bN7H/k', b'0'),
  ('pluto''''', '$2y$10$2fUgKSVwceH31520BPj3SeXHtoMGN1Y3YkYe5M0lsAk', b'0'),
  ('kkk', '$2y$10$hOUFKO00bnKS23ytYTt27.4SJn7U4lSFCNuI94tOJEx', b'0'),
  ('mmm', '$2y$10$CBree1bhugHvOM8.vXkFJOPy0uxU3yGDJrJc17foNZR', b'0'),
  ('nnn', '$2y$10$5yet6kRyYYp/tDf5ItLbLe0wMUZA6kvTl8ubqXR21V0', b'0'),
  ('a', '$2y$10$q7BO94/GiUlg6cv78y5Tk.yyP.s5b/OYomhaCZ3jvj9', b'0'),
  ('poi', '$2y$10$x/ehthay.DQR38sCLJmqbeOEy7UrmD4qL4h6hD27cTC', b'0'),
  ('luca', '$2y$10$yt03YtxYPHw764gJ68nvxeGcxqCugqk55XaPMq9/QJ7', b'0'),
  ('h', '$2y$10$yXZEO.d13bQ8IgolvUJFlOh6ovebS.Fh9pCUkG1vsSg', b'0'),
  ('r', '$2y$10$o74OgzbPbU1BdAXm/lU31OPWtbAIfPNrOVqUSuuEau.', b'0'),
  ('lollo', '$2y$10$939UiwkczYiVMAfOFlwDJeIqCuUsPWNkboIMujGk9Uu', b'0'),
  ('ciao', '$2y$10$FxWEi2RUWQ93ZWeWEcUAHu6NAWt.dSlBs3XTuRezSeE', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `day-pos` (`day`,`lat`,`lon`);

--
-- Indexes for table `Followed`
--
ALTER TABLE `Followed`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `Profiles`
--
ALTER TABLE `Profiles`
  ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Signaled`
--
ALTER TABLE `Signaled`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
