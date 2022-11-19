--
-- Database: `hisakes`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `PL` tinyint(4) NOT NULL,
  `ImgLocation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Username` varchar(50) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Username`);

-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Username`,`Rating`,`Feedback`);

-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`Username`) REFERENCES `account` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
