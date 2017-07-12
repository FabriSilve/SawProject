--
-- Struttura della tabella `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `username` varchar(40) CHARACTER SET ascii NOT NULL,
  `email` varchar(40) CHARACTER SET ascii NOT NULL,
  `password` varchar(50) CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Users`
--

INSERT INTO `Users` (`username`, `email`, `password`) VALUES
('faber', 'faber@mail.it', '$2y$10$Jf4EPRIyAsCqQvBNO.rA9.nLI5P1JL5jZjUOFhQVgURDfDSMndv/e'),
('VERA', 'vera@mail.it', '$2y$10$sK1qkxj7Btm5rysZu5IKX.2YkaZjw7iaVMXJg6ON6f0RWyIF3/Axe'),
('Richard', 'paolo@gmail.com', '$2y$10$t8uyCffoSXFuS35zINLK/OlZaCGKSRJYNFuBM.IOe0/OCocEVWqVq'),
('richard2', 'rich@mail.it', '$2y$10$.f8v21PGxjZMO1pwliIY3ecItTDMEOZbRK5LOCfrbh89aEGXrgWzu'),
('michela', 'michi@mail.it', '$2y$10$7TX2PjkJc9rS1tpHheJHFOCwd/QYl3ZXk2BNeBtUYGRaGtbI7X0v2'),
('Ale', 'ale@mail.it', '$2y$10$tfxVihfIHscuWFAwT/FFJu3HBquN2CbuWkMrXyNQWVIaaFWD0IkIa'),
('Mattia', 'mattia@email.it', '$2y$10$R7TBQgW9GbLOmIWmI4/o/eJvE3ZWZtWfGlhrTl4S/uc1ZgLxpaxJa'),
('Michele', 'michelesilvestri90@yahoo.it', '$2y$10$ar5iJf1NHVDgtiptioxZSO5I328f5CFCniDjUnxHUbLnyUeqnRkIa'),
('nicola', 'nicpatr@hotmail.com', '$2y$10$FVNt51Um87O5kAQHK9cRhOFSriKROZa6LBzAx8Kf51pJuJZdczQtC'),
('massimiliano', 'massi.@email.it', '$2y$10$SIKGTjv.BLk.l28gBMvGR.UW9l.v/1oag7E879mcsmrMT4dKNte2i'),
('isabella', 'isabellanajera03@Gmail.com', '$2y$10$5/watRSEucn5fQHQSIR9k.4wrBMgPW/2hazk2lOWYi4vcQIJfff..'),
('Pippo', 'pippo@mail.it', '$2y$10$TVJPRHvpCfbYR8683.U.f.b7cVnZzGA1LLCO7BdjDzym3876DPzHW'),
('eu.', 'qwerty@mail5.it', '$2y$10$2LINpDlMTzjTRJlvD263nOPN8Wq2ORfxjYqNMvUZSW5FGdmUfIkDW'),
('silvia', 'silvia@mail.it', '$2y$10$zW/5JNO8AcEkjL9zzK0ahOFdXNGf4yQpwBf.9.GFA/ATw2WmBKGea');

-- --------------------------------------------------------

--
-- Struttura della tabella `Events`
--

CREATE TABLE IF NOT EXISTS `Events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET ascii NOT NULL,
  `description` varchar(300) CHARACTER SET ascii NOT NULL,
  `image` varchar(150) CHARACTER SET ascii NOT NULL,
  `day` date NOT NULL,
  `address` varchar(100) CHARACTER SET ascii NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `owner` varchar(40) DEFAULT NULL REFERENCES Users(username),
  PRIMARY KEY (`id`),
  UNIQUE KEY `day-pos` (`day`,`lat`,`lon`),
  UNIQUE KEY `image` (`image`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `Events`
--

INSERT INTO `Events` (`id`, `name`, `description`, `image`, `day`, `address`, `lat`, `lon`, `owner`) VALUES
(1, 'pippo', 'descrizione', 'viale_carlo_canepa_genova_2017-06-29.jpg', '2017-06-29', 'viale carlo canepa genova', 44.4270998, 8.8506773, 'faber'),
(2, 'evento', 'pippo', 'genova_2017-06-29.jpg', '2017-06-29', 'genova', 44.4056499, 8.946256, 'faber'),
(3, 'yff', 'but ghoul', 'yhh_2017-06-29.jpg', '2017-06-29', 'yhh', 4.803069, 114.653666, 'faber'),
(4, 's ilvia', 'piace', 'pizza_baracca_Genova_2017-06-29.jpg', '2017-06-29', 'pizza baracca Genova', 44.4251139, 8.8493762, 'faber');

-- --------------------------------------------------------

--
-- Struttura della tabella `Followed`
--

CREATE TABLE IF NOT EXISTS `Followed` (
  `id` int(11) NOT NULL REFERENCES Events(id),
  `username` varchar(40) CHARACTER SET ascii NOT NULL REFERENCES Users(usenrame),
  PRIMARY KEY (`id`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Followed`
--

INSERT INTO `Followed` (`id`, `username`) VALUES
(1, 'faber'),
(2, 'faber'),
(4, 'faber'),
(1026, 'faber');

-- --------------------------------------------------------

--
-- Struttura della tabella `Signaled`
--

CREATE TABLE IF NOT EXISTS `Signaled` (
  `id` int(11) NOT NULL REFERENCES Events(id),
  `username` varchar(40) CHARACTER SET ascii NOT NULL REFERENCES Users(username),
  PRIMARY KEY (`id`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Signaled`
--

INSERT INTO `Signaled` (`id`, `username`) VALUES
(1, 'faber'),
(2, 'faber'),
(1023, 'richard');

-- --------------------------------------------------------


