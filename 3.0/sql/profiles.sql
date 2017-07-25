--
-- Struttura della tabella `profiles`
--

CREATE TABLE IF NOT EXISTS `Profiles` (
  `username` varchar(40) CHARACTER SET ascii NOT NULL REFERENCES Users(username),
  `nome` varchar(40) CHARACTER SET ascii,
  `cognome` varchar(50) CHARACTER SET ascii,
  `email` varchar(40) CHARACTER SET ascii NOT NULL,
  `residenza` varchar(40) CHARACTER SET ascii,
  `link_social` varchar(128) CHARACTER SET ascii,
  `auto_descrizione` varchar(255) CHARACTER SET ascii,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
