SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `S4116422`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`username`, `email`, `password`) VALUES
('faber', 'faber@admin.it', '$2y$10$2ThYd4VsfPj0sTUGwJiQfev7bwPyrV9AUUlDIJbtwUeuvv7vQhbW.');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE IF NOT EXISTS `Events` (
`id` int(10) NOT NULL,
  `name` varchar(50) CHARACTER SET ascii NOT NULL,
  `description` text CHARACTER SET ascii NOT NULL,
  `day` date NOT NULL,
  `address` varchar(100) CHARACTER SET ascii NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `owner` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Followed`
--

CREATE TABLE IF NOT EXISTS `Followed` (
  `id` int(10) NOT NULL,
  `username` varchar(50) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
`id` int(10) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `day` date NOT NULL,
  `time` time NOT NULL,
  `text` text NOT NULL,
  `readed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Profiles`
--

CREATE TABLE IF NOT EXISTS `Profiles` (
  `username` varchar(50) CHARACTER SET ascii NOT NULL,
  `name` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `email` varchar(50) CHARACTER SET ascii NOT NULL,
  `residence` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `link` varchar(128) CHARACTER SET ascii DEFAULT NULL,
  `description` varchar(255) CHARACTER SET ascii DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Signaled`
--

CREATE TABLE IF NOT EXISTS `Signaled` (
  `id` int(10) NOT NULL,
  `username` varchar(50) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `username` varchar(50) CHARACTER SET ascii NOT NULL,
  `password` varchar(255) CHARACTER SET ascii NOT NULL,
  `banned` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
