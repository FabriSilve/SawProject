--
-- Struttura della tabella `profiles`
--

CREATE TABLE `profiles` (
  `username` varchar(50) NOT NULL,
  `description` varchar(300),
  PRIMARY KEY (`username`),
    FOREIGN KEY (`username`)REFERENCES accounts(username)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;