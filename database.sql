-- Script for creating needed Database
-- Delete it if you create the DB!!!

--
-- Datenbank: `agentdata`
--
CREATE DATABASE IF NOT EXISTS `agentdata` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agentdata`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `id` int(5) NOT NULL,
  `DisplayName` varchar(250) NOT NULL,
  `GOOGLE_ID` varchar(25) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `AgentName` varchar(50) NOT NULL,
  `Einsatzgebiet` varchar(250) NOT NULL,
  `CodeWord` varchar(50) NOT NULL,
  `Timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
