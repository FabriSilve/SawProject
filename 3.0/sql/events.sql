--
-- Struttura della tabella `events`
--

CREATE TABLE `events` (
  `name` varchar(30) NOT NULL,
  `day` date NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `descriprion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `events`
--

INSERT INTO `events` (`name`, `day`, `latitude`, `longitude`, `descriprion`) VALUES
('evento 1', '2017-05-31', 0.003, 0.003, 'descrizione 1'),
('evento 10', '2017-06-07', 0.002, -0.004, 'descrizione 10'),
('evento 2', '2017-05-30', 0.002, 0.002, 'descrizione 2'),
('evento 3', '2017-06-17', 0.005, 0.005, 'descrizione 3'),
('evento 4', '2017-06-06', 0.002, 0.001, 'description 4'),
('evento 5', '2017-06-07', 0.001, 0.004, 'descrizione 5'),
('evento 6', '2017-06-07', -0.001, -0.004, 'descrizione 6'),
('evento 7', '2017-06-07', -0.002, 0.003, 'descrizione 7'),
('evento 8', '2017-06-07', -0.002, -0.003, 'descrizione 8'),
('evento 9', '2017-06-07', -0.003, -0.003, 'descrizione 9');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`name`,`day`);
