--
-- Struttura della tabella `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


