CREATE TABLE `Admin` (
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
('aa', 'a@j.y', '$2y$10$1IQ5aY8bvH2MCW3/V3BH9uRZ3ltbzpz8jCcIsxYaqEmkW1p2v/qQu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;