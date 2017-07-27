--
-- Struttura della tabella `profiles`
--

CREATE TABLE IF NOT EXISTS `Profiles` (
  `username` varchar(40) CHARACTER SET ascii NOT NULL REFERENCES Users(username),
  `name` varchar(40) CHARACTER SET ascii,
  `surname` varchar(50) CHARACTER SET ascii,
  `email` varchar(40) CHARACTER SET ascii NOT NULL,
  `residence` varchar(40) CHARACTER SET ascii,
  `link` varchar(128) CHARACTER SET ascii,
  `description` varchar(255) CHARACTER SET ascii,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
