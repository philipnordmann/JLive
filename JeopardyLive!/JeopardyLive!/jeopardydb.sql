-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Nov 2016 um 08:47
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `jeopardydb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragen`
--

CREATE TABLE `fragen` (
  `F_ID` int(7) NOT NULL,
  `Frage` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Antwort` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Wertung` enum('100','200','300','400','500') CHARACTER SET latin1 NOT NULL,
  `K_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `fragen`
--

INSERT INTO `fragen` (`F_ID`, `Frage`, `Antwort`, `Wertung`, `K_ID`) VALUES
(1, 'Worüber wird die Tastatur angeschlossen? (North oder south bridge?)', 'South Bridge', '300', 1),
(5, 'Welche Firma hat die Hub-Architektur Entwickelt?', 'Intel', '100', 1),
(6, 'Was ist die Hauptaufgabe des Chipsatz?', 'Kommunikation der Komponenten', '200', 1),
(7, 'Wofür wird der LPC in der Hub-Architektur benutzt?', 'Für die Anbindung älterer Anschlüsse (PS/2) usw.', '500', 1),
(8, 'Was verliert langsam an bedeutung?', 'Der Chipsatz ;)', '400', 1),
(9, 'Wie viele Schichten hat das OSI Modell?', '7', '100', 3),
(10, 'Wofür steht DDRRAM?', 'Double Data Rate Random Access Memory', '100', 2),
(11, 'Worin unterscheiden sich SRAMs und DRAMs? (im wesentlichen)', 'FlipFlops, Transistoren', '200', 2),
(12, 'Wann kam DDR 5 erstmals auf den Markt?', 'Noch gar nicht.', '300', 2),
(13, 'Wie groß ist die Zugriffszeit bei einem Cache Speicher (SRAM)?', '5 bis 15 nSec', '400', 2),
(14, 'Wie wird die Datenübertragungsrate berechnet?', '(Takt der Speicherzellen * Bit pro Übertragung * Prefetch)/8Bit', '500', 2),
(15, 'Wofür steht KM? (Tipp: Die bekannteste und flächenmäßig größte WG Europas)', 'Kings Mansion', '100', 12),
(16, 'Welches Zimmer in der KM ist das letzte auf der rechten Seite?', 'Das Gästezimmer', '300', 12),
(17, 'Wo befindet sich die KM?', 'Bali', '200', 12),
(18, 'Gründungsjahr der KM ?', '2015', '400', 12),
(19, 'Wie heißen die Vorstandsmitglieder der KM?', 'Herr Whyannik Whyberg\r\nHerr Philip Nordmannn\r\nHerr Szymon Padberg', '500', 12),
(20, 'Nachteile vom Nadeldrucker', 'sehr laut, sehr schlechte Grafikfähigkeit', '100', 13),
(21, 'Eigenschaften des Typenraddruckers', 'Schreibmaschinenähnlich;  kaum noch Verwendung;  beste Schriftqualität', '200', 13),
(22, 'Was geben Graustufen/Farbtiefe an?', 'den Speicherplatzbedarf pro erkanntem Bildpunkt', '300', 13),
(23, 'Was ist die maximale Auflösung eines Tintenstrahldruckers?', '2880 dpi', '400', 13),
(24, 'Nenne die 3 Hauptbauelemente des Thermodruckers', 'Elektrode, Heizplättchen, Leiterbahnen', '500', 13),
(25, 'Wofür steht die Abkürzung UML?', 'Unified Modeling Language', '100', 14),
(26, 'Wofür steht die Abkürzung FLOP?', 'Floating Point Operation', '200', 14),
(27, 'Wie heißt die sechste Schicht des ISO - OSI Modells?', 'Presentation', '300', 14),
(28, 'Welche verschiedenen Zugriffsrechte auf Klassenkomponenten bietet JAVA?', 'public, protected, private, default', '400', 14),
(29, 'Wofür steht die Abkürzung CSMA/CD?', 'Carrier Sense Multiple Access (with) Collision Detection', '500', 14),
(30, 'Was befindet sich jeweils auf einer Seite in der GuV?', 'Links: Aufwendungen, Rechts: Erträge', '100', 15),
(31, 'Wieviel Startkapital benötigt man um eine Aktiengesellschaft zugründen?', '50000', '200', 15),
(32, 'Wie lautet die Zinsformel?', 'Z = K * p * t / 100 * 360', '300', 15),
(33, 'Wer haftet bei einer GmbH und Co. KG?', 'Die GmbH als juristische Person', '400', 15),
(34, 'Nennen Sie die 4 Stufen eines Produktportfolios', 'Question Marks, Stars, Poor Dogs, Cash cows', '500', 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

CREATE TABLE `kategorien` (
  `K_ID` int(7) NOT NULL,
  `Bezeichnung` varchar(30) NOT NULL,
  `T_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorien`
--

INSERT INTO `kategorien` (`K_ID`, `Bezeichnung`, `T_ID`) VALUES
(1, 'Chipsatz', 1),
(2, 'RAM', 1),
(3, 'OSI', 2),
(12, 'KM', 1),
(13, 'Drucker', 1),
(14, 'Anwendungsentwicklung', 1),
(15, 'WGP', 1),
(16, 'unnoetig1', 1),
(17, 'unnoetig2', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `themen`
--

CREATE TABLE `themen` (
  `T_ID` int(7) NOT NULL,
  `Bezeichnung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `themen`
--

INSERT INTO `themen` (`T_ID`, `Bezeichnung`) VALUES
(1, 'ITS Block 1'),
(2, 'ITN Block 1'),
(3, 'kleines Huendchen');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fragen`
--
ALTER TABLE `fragen`
  ADD PRIMARY KEY (`F_ID`),
  ADD KEY `K_ID` (`K_ID`);

--
-- Indizes für die Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  ADD PRIMARY KEY (`K_ID`),
  ADD KEY `T_ID` (`T_ID`);

--
-- Indizes für die Tabelle `themen`
--
ALTER TABLE `themen`
  ADD PRIMARY KEY (`T_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fragen`
--
ALTER TABLE `fragen`
  MODIFY `F_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT für Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  MODIFY `K_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT für Tabelle `themen`
--
ALTER TABLE `themen`
  MODIFY `T_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
