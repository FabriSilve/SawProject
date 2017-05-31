--
-- Struttura della tabella `events`
--

CREATE TABLE `events` (
  `username` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `day` date NOT NULL,
  `address` varchar(70) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `descriprion` varchar(200) NOT NULL,
  `link` varchar (70),
  FOREIGN KEY (`username`) REFERENCES accounts(username),
  PRIMARY KEY (`name`,`day`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `events`
--

INSERT INTO `events` (`username`, `name`, `day`, `address`, `latitude`, `longitude`, `descriprion`, `link`) VALUES
('faber', 'evento 1', '2017-05-31', 'indirizzo1', 0.003, 0.003, 'descrizione 1', null),
('faber', 'evento 10', '2017-06-07', 'indirizzo2', 0.002, -0.004, 'descrizione 10', null),
('vera', 'evento 2', '2017-05-30', 'indirizzo3', 0.002, 0.002, 'descrizione 2', null),
('vera', 'evento 3', '2017-06-17','indirizzo4', 0.005, 0.005, 'descrizione 3', 'www.google.it'),
('ste','evento 4', '2017-06-06', 'indirizzo 5', 0.002, 0.001, 'description 4', null),
('faber','evento 5', '2017-06-07','indirizzo1', 0.001, 0.004, 'descrizione 5', null),
('faber','evento 6', '2017-06-07','indirizzo1', -0.001, -0.004, 'descrizione 6', null),
('faber','evento 7', '2017-06-07','indirizzo1', -0.002, 0.003, 'descrizione 7', null),
('faber','evento 8', '2017-06-07','indirizzo1', -0.002, -0.003, 'descrizione 8', null),
('faber','evento 9', '2017-06-07','indirizzo1', -0.003, -0.003, 'descrizione 9', null);

