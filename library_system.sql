-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2022 m. Kov 02 d. 03:34
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_system`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `autorius`
--

CREATE TABLE `autorius` (
  `nr` int(11) NOT NULL,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `gimimo_data` date NOT NULL,
  `lytis` int(11) DEFAULT NULL,
  `salis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `autorius`
--

INSERT INTO `autorius` (`nr`, `vardas`, `pavarde`, `gimimo_data`, `lytis`, `salis`) VALUES
(1, 'Niven', 'Fairleigh', '1912-08-07', 1, 12),
(2, 'Emmi', 'Avramow', '1934-03-03', 2, 13),
(3, 'Stanislaw', 'Kupker', '1993-12-20', 1, 2),
(4, 'Di', 'Kenchington', '1937-12-19', 1, 5),
(5, 'Charyl', 'Jemmett', '1990-01-16', 1, 5),
(6, 'Pebrook', 'Marchetti', '1974-12-19', 2, 1),
(7, 'Elisabetta', 'Phippen', '1947-09-20', 2, 2),
(8, 'Powell', 'Kamen', '1974-07-17', 2, 4),
(9, 'Othella', 'Roly', '1979-12-26', 1, 15),
(10, 'Elonore', 'Mallison', '1902-12-04', 2, 15),
(11, 'North', 'McElwee', '1950-03-15', 1, 8),
(12, 'Winnie', 'Mingaye', '1963-03-21', 2, 10),
(13, 'Honoria', 'Pelzer', '1987-07-21', 2, 10),
(14, 'Nicolis', 'Erett', '1954-10-14', 2, 1),
(15, 'Osmond', 'Saller', '1973-12-09', 2, 5),
(16, 'Ilyssa', 'Muris', '1954-07-03', 1, 13),
(17, 'Rodrique', 'Boyle', '1901-03-21', 2, 1),
(18, 'Town', 'Sharrocks', '1926-08-05', 1, 7),
(19, 'Penrod', 'Unwin', '1928-05-16', 2, 7),
(20, 'Gwenneth', 'Whild', '1909-05-21', 1, 1),
(21, 'Kliment', 'Hawkswood', '1912-10-10', 1, 13),
(22, 'Berti', 'Marcq', '1908-10-16', 1, 12),
(23, 'Xenos', 'Gynn', '1946-09-10', 1, 14),
(24, 'Lita', 'Oliff', '1963-08-27', 2, 1),
(25, 'Gothart', 'Dun', '1938-07-02', 2, 8),
(26, 'Batholomew', 'Blackbrough', '1924-07-10', 2, 4),
(27, 'Kip', 'Hargraves', '1930-09-03', 2, 7),
(28, 'Phillipp', 'Devlin', '1976-11-17', 2, 15),
(29, 'Renard', 'Clitsome', '1991-06-22', 2, 1),
(30, 'Kristien', 'De Freyne', '1953-03-22', 1, 12),
(31, 'Manuel', 'Batrip', '1995-07-18', 1, 2),
(32, 'Felita', 'Copp', '1905-01-12', 1, 7),
(33, 'Ashil', 'Cammocke', '1939-07-16', 2, 10),
(34, 'Frederica', 'Clive', '1961-01-19', 1, 3),
(35, 'Gail', 'Gullivent', '1954-10-22', 1, 9),
(36, 'Hannie', 'Ansty', '1991-09-22', 2, 3),
(37, 'Ileane', 'Izod', '1958-05-19', 2, 15),
(38, 'Marie-jeanne', 'Ollin', '1934-11-02', 2, 12),
(39, 'Helena', 'McCome', '1969-10-11', 2, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `darbuotojas`
--

CREATE TABLE `darbuotojas` (
  `nr` int(11) NOT NULL,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `gimimo_data` date NOT NULL,
  `elektroninis_pastas` varchar(255) NOT NULL,
  `lytis` int(11) DEFAULT NULL,
  `fk_MIESTASnr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `darbuotojas`
--

INSERT INTO `darbuotojas` (`nr`, `vardas`, `pavarde`, `gimimo_data`, `elektroninis_pastas`, `lytis`, `fk_MIESTASnr`) VALUES
(1, 'Robinett', 'Slader', '2008-06-14', 'rslader0@csmonitor.com', 2, 5),
(2, 'Garek', 'Renak', '1960-04-25', 'grenak1@liveinternet.ru', 2, 1),
(3, 'Gard', 'Tommasetti', '1960-02-19', 'gtommasetti2@blogger.com', 2, 4),
(4, 'Doe', 'Shiers', '2004-03-25', 'dshiers3@opera.com', 2, 6),
(5, 'Sofia', 'Gosnoll', '1962-06-28', 'sgosnoll4@examiner.com', 1, 4),
(6, 'Laurene', 'Bravery', '2009-07-20', 'lbravery5@chron.com', 1, 4),
(7, 'Darleen', 'Huckleby', '1952-10-11', 'dhuckleby6@marketwatch.com', 1, 9),
(8, 'Alyse', 'Knok', '2002-05-23', 'aknok7@jugem.jp', 1, 2),
(9, 'Patty', 'Faulds', '1962-09-26', 'pfaulds8@who.int', 2, 9),
(10, 'Abbi', 'Twinborne', '1975-05-04', 'atwinborne9@hp.com', 2, 6),
(11, 'Brandtr', 'Orbon', '1987-08-27', 'borbona@blogs.com', 2, 1),
(12, 'Norbie', 'Dalgleish', '1986-11-20', 'ndalgleishb@comcast.net', 1, 4),
(13, 'Rosetta', 'Bees', '1978-12-01', 'rbeesc@arizona.edu', 1, 3),
(14, 'Sammy', 'Hammand', '1961-07-28', 'shammandd@pen.io', 1, 10),
(15, 'Klaus', 'Fortescue', '1967-06-17', 'kfortescuee@blogs.com', 2, 9),
(16, 'Corrie', 'Dietz', '1993-06-29', 'cdietzf@boston.com', 2, 3),
(17, 'Dore', 'McNair', '2004-03-25', 'dmcnairg@cafepress.com', 2, 8),
(18, 'Joy', 'Donegan', '1961-10-15', 'jdoneganh@dropbox.com', 1, 7),
(19, 'Shae', 'Nequest', '1990-06-15', 'snequesti@ifeng.com', 1, 7),
(20, 'Kerrin', 'Spinige', '2001-07-08', 'kspinigej@zimbio.com', 1, 2),
(21, 'Paquito', 'But', '1966-03-18', 'pbutk@wisc.edu', 2, 3),
(22, 'Joellen', 'Bartosiak', '2001-07-06', 'jbartosiakl@shutterfly.com', 2, 2),
(23, 'Koressa', 'Blakemore', '2001-07-06', 'kblakemorem@nature.com', 1, 3),
(24, 'Raven', 'Doerling', '1996-05-09', 'rdoerlingn@paypal.com', 1, 6),
(25, 'Rickey', 'Collyear', '1959-04-17', 'rcollyearo@yandex.ru', 1, 5);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `kalba`
--

CREATE TABLE `kalba` (
  `nr` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `sutrumpinimas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `kalba`
--

INSERT INTO `kalba` (`nr`, `pavadinimas`, `sutrumpinimas`) VALUES
(1, 'Lietuviu', 'LT'),
(2, 'Anglu', 'ENG'),
(3, 'Rusu', 'RUS');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `knyga`
--

CREATE TABLE `knyga` (
  `nr` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `isleidimo_data` date NOT NULL,
  `fk_KALBAnr` int(11) NOT NULL,
  `fk_ZANRASnr` int(11) NOT NULL,
  `fk_AUTORIUSnr` int(11) NOT NULL,
  `fk_LEIDYKLAnr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `knyga`
--

INSERT INTO `knyga` (`nr`, `pavadinimas`, `isleidimo_data`, `fk_KALBAnr`, `fk_ZANRASnr`, `fk_AUTORIUSnr`, `fk_LEIDYKLAnr`) VALUES
(1, 'Merops sp.', '2016-07-23', 2, 4, 23, 4),
(2, 'Buteo regalis', '2015-05-24', 2, 6, 15, 2),
(3, 'Erinaceus frontalis', '2018-01-22', 2, 2, 24, 3),
(4, 'Smithopsis crassicaudata', '2021-10-23', 2, 2, 20, 3),
(5, 'Butorides striatus', '2020-11-01', 2, 4, 20, 1),
(6, 'Spizaetus coronatus', '2014-09-11', 2, 6, 30, 3),
(7, 'Rhea americana', '2021-10-27', 2, 7, 14, 5),
(8, 'Anitibyx armatus', '2013-08-23', 2, 8, 3, 4),
(9, 'Geochelone elephantopus', '2010-03-03', 2, 2, 33, 3),
(10, 'Suricata suricatta', '2015-09-07', 2, 7, 30, 1),
(11, 'Meles meles', '2015-02-05', 2, 7, 2, 3),
(12, 'Nyctereutes procyonoides', '2012-10-20', 2, 6, 34, 3),
(13, 'Ardea cinerea', '2020-02-16', 2, 7, 29, 5),
(14, 'Spermophilus richardsonii', '2021-11-25', 2, 1, 35, 4),
(15, 'Paraxerus cepapi', '2013-08-13', 2, 7, 13, 4),
(16, 'Psophia viridis', '2011-02-19', 2, 3, 33, 2),
(17, 'Tragelaphus scriptus', '2017-03-17', 2, 5, 18, 5),
(18, 'Macropus agilis', '2017-09-09', 2, 1, 3, 4),
(19, 'Heloderma horridum', '2021-06-17', 2, 8, 39, 3),
(20, 'Paraxerus cepapi', '2016-05-17', 2, 4, 30, 2),
(21, 'Sarcophilus harrisii', '2020-02-28', 2, 8, 26, 4),
(22, 'Connochaetus taurinus', '2018-10-21', 2, 7, 30, 4),
(23, 'Litrocranius walleri', '2013-01-24', 2, 4, 10, 2),
(24, 'Phoeniconaias minor', '2010-04-06', 2, 4, 13, 4),
(25, 'Haematopus ater', '2021-07-19', 2, 5, 3, 4);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `leidykla`
--

CREATE TABLE `leidykla` (
  `nr` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `salis` int(11) NOT NULL,
  `fk_MIESTASnr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `leidykla`
--

INSERT INTO `leidykla` (`nr`, `pavadinimas`, `salis`, `fk_MIESTASnr`) VALUES
(1, 'Alma litera', 1, 3),
(2, 'Andrena', 1, 3),
(3, 'Apostrofa', 1, 4),
(4, 'Aukso zuvys', 1, 4),
(5, 'Artuma', 1, 4),
(6, 'Artseria', 1, 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lytis`
--

CREATE TABLE `lytis` (
  `id_LYTIS` int(11) NOT NULL,
  `name` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `lytis`
--

INSERT INTO `lytis` (`id_LYTIS`, `name`) VALUES
(1, 'Vyras'),
(2, 'Moteris');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `miestas`
--

CREATE TABLE `miestas` (
  `nr` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `vietoves_kodas` int(11) NOT NULL,
  `salis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `miestas`
--

INSERT INTO `miestas` (`nr`, `pavadinimas`, `vietoves_kodas`, `salis`) VALUES
(1, 'Alytus', 6787, 1),
(2, 'Utena', 3635, 1),
(3, 'Vilnius', 1111, 1),
(4, 'Kaunas', 2222, 1),
(5, 'Klaiped', 3333, 1),
(6, 'Siauliai', 4444, 1),
(7, 'Palanga', 1234, 1),
(8, 'Trakai', 4321, 1),
(9, 'Panevezys', 6666, 1),
(10, 'Telsiai', 7777, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `salis`
--

CREATE TABLE `salis` (
  `id_SALIS` int(11) NOT NULL,
  `name` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `salis`
--

INSERT INTO `salis` (`id_SALIS`, `name`) VALUES
(1, 'Lietuva'),
(2, 'Latvija'),
(3, 'Estija'),
(4, 'Norvegija'),
(5, 'Svedija'),
(6, 'Danija'),
(7, 'JAV'),
(8, 'Vokietija'),
(9, 'Ispanija'),
(10, 'Graikija'),
(11, 'Kinija'),
(12, 'Japonija'),
(13, 'Ukraina'),
(14, 'Gruzija'),
(15, 'Rusija');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `skaitytojas`
--

CREATE TABLE `skaitytojas` (
  `nr` int(11) NOT NULL,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `gimimo_data` date NOT NULL,
  `elektroninis_pastas` varchar(255) NOT NULL,
  `lytis` int(11) DEFAULT NULL,
  `fk_MIESTASnr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `skaitytojas`
--

INSERT INTO `skaitytojas` (`nr`, `vardas`, `pavarde`, `gimimo_data`, `elektroninis_pastas`, `lytis`, `fk_MIESTASnr`) VALUES
(1, 'Kiri', 'Cramphorn', '1990-06-23', 'kcramphornqk@cdbaby.com', 1, 4),
(2, 'Mavis', 'Menguy', '1997-01-12', 'mmenguyql@dedecms.com', 2, 4),
(3, 'Joshua', 'Kinchin', '1994-05-04', 'jkinchinqm@house.gov', 2, 4),
(4, 'Nichols', 'Courtliff', '1962-08-12', 'ncourtliffqn@icio.us', 1, 4),
(5, 'Margette', 'Ishchenko', '1959-10-23', 'mishchenkoqo@chron.com', 1, 4),
(6, 'Jocelyn', 'Scones', '1989-12-04', 'jsconesqp@techcrunch.com', 2, 4),
(7, 'Thaddus', 'Scard', '2006-10-01', 'tscardqq@youtube.com', 1, 4),
(8, 'Marnie', 'Caldairou', '1970-10-16', 'mcaldairouqr@toplist.cz', 2, 4),
(9, 'Leilah', 'Loder', '2008-06-15', 'lloderqs@chicagotribune.com', 1, 4),
(10, 'Teador', 'Udey', '1986-10-19', 'tudeyqt@ebay.co.uk', 2, 4),
(11, 'Berne', 'Mitchener', '1990-03-05', 'bmitchenerqu@accuweather.com', 1, 4),
(12, 'Randall', 'Zanardii', '1992-03-18', 'rzanardiiqv@xrea.com', 1, 4),
(13, 'Silvana', 'Pirie', '2007-09-24', 'spirieqw@oakley.com', 1, 4),
(14, 'Eduard', 'Kislingbury', '1961-06-29', 'ekislingburyqx@lulu.com', 2, 4),
(15, 'Adela', 'Ayliff', '1995-07-28', 'aayliffqy@imgur.com', 2, 4),
(16, 'Marla', 'Anwyl', '2000-06-20', 'manwylqz@mysql.com', 2, 4),
(17, 'Crin', 'Thornton-Dewhirst', '2006-04-28', 'cthorntondewhirstr0@hao123.com', 1, 4),
(18, 'Clem', 'Farmiloe', '1962-07-03', 'cfarmiloer1@time.com', 2, 4),
(19, 'Sheppard', 'Kirstein', '1956-01-04', 'skirsteinr2@cnbc.com', 2, 4),
(20, 'Mimi', 'Vanes', '1959-10-07', 'mvanesr3@bloomberg.com', 2, 4),
(21, 'Giuditta', 'Charteris', '1999-05-31', 'gcharterisr4@bing.com', 2, 4),
(22, 'Albert', 'Cote', '1989-01-12', 'acoter5@comcast.net', 1, 4),
(23, 'Jerrold', 'Pontefract', '1994-11-22', 'jpontefractr6@shutterfly.com', 2, 4),
(24, 'Georgianne', 'D\'Adda', '1994-01-13', 'gdaddar7@bloglines.com', 1, 4),
(25, 'Haily', 'Rebert', '2007-06-08', 'hrebertr8@issuu.com', 1, 4),
(26, 'Lin', 'Kemetz', '1965-04-02', 'lkemetzr9@smugmug.com', 2, 4),
(27, 'Alis', 'Vink', '1955-04-29', 'avinkra@google.pl', 2, 4),
(28, 'Gordy', 'Innis', '1990-06-01', 'ginnisrb@psu.edu', 2, 4),
(29, 'Abbe', 'Zanutti', '1974-05-30', 'azanuttirc@microsoft.com', 1, 4),
(30, 'Efrem', 'Smales', '1963-07-10', 'esmalesrd@devhub.com', 2, 4),
(31, 'Welch', 'Haddow', '1965-01-24', 'whaddowre@nasa.gov', 2, 4),
(32, 'Terri', 'Foldes', '1989-08-25', 'tfoldesrf@japanpost.jp', 1, 4),
(33, 'Erv', 'Bramall', '2006-11-01', 'ebramallrg@instagram.com', 1, 4),
(34, 'Meagan', 'Dmitriev', '1986-08-01', 'mdmitrievrh@bandcamp.com', 1, 4),
(35, 'Benedikt', 'MacLleese', '1957-10-25', 'bmaclleeseri@51.la', 2, 4),
(36, 'Eleanore', 'Albisser', '1995-08-30', 'ealbisserrj@nifty.com', 2, 4),
(37, 'Mirabella', 'Ashelford', '2007-09-25', 'mashelfordrk@free.fr', 2, 4),
(38, 'Mayer', 'Hansmann', '1970-03-12', 'mhansmannrl@reference.com', 1, 4),
(39, 'Ceciley', 'Nendick', '1988-08-27', 'cnendickrm@msn.com', 2, 4),
(40, 'Rita', 'Reece', '1999-01-14', 'rreecern@buzzfeed.com', 1, 4),
(41, 'Peter', 'Lane', '1988-08-02', 'planero@guardian.co.uk', 2, 4),
(42, 'Heywood', 'McGebenay', '1968-11-25', 'hmcgebenayrp@hatena.ne.jp', 1, 4),
(43, 'Devlin', 'Allix', '1961-04-05', 'dallixrq@tiny.cc', 2, 4),
(44, 'Gerty', 'Scandred', '1967-04-27', 'gscandredrr@cbc.ca', 1, 4);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `sutartis`
--

CREATE TABLE `sutartis` (
  `nr` int(11) NOT NULL,
  `isdavimo_data` date NOT NULL,
  `grazinimo_data` date DEFAULT NULL,
  `fk_SKAITYTOJASnr` int(11) NOT NULL,
  `fk_DARBUOTOJASnr` int(11) NOT NULL,
  `fk_KNYGAnr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `sutartis`
--

INSERT INTO `sutartis` (`nr`, `isdavimo_data`, `grazinimo_data`, `fk_SKAITYTOJASnr`, `fk_DARBUOTOJASnr`, `fk_KNYGAnr`) VALUES
(1, '2020-02-23', NULL, 39, 1, 1),
(2, '2019-10-01', NULL, 18, 2, 18),
(3, '2018-11-26', NULL, 42, 22, 9),
(4, '2018-01-18', NULL, 43, 18, 21),
(5, '2020-01-31', '2020-03-14', 26, 12, 8),
(6, '2016-04-04', '2020-06-22', 10, 22, 20),
(7, '2019-08-09', '2021-05-23', 28, 4, 7),
(8, '2017-03-17', NULL, 14, 1, 8),
(9, '2017-09-14', NULL, 31, 18, 25),
(10, '2016-10-03', NULL, 30, 4, 11),
(11, '2020-01-02', '2020-08-08', 10, 16, 18),
(12, '2020-02-06', '2021-12-24', 10, 5, 5),
(13, '2017-04-29', '2020-05-15', 41, 21, 18),
(14, '2018-08-21', '2020-12-09', 10, 18, 15),
(15, '2019-10-26', NULL, 36, 7, 15),
(16, '2018-10-08', NULL, 16, 8, 14),
(17, '2018-10-16', '2021-06-03', 17, 2, 24),
(18, '2018-10-22', '2021-09-30', 1, 17, 11),
(19, '2017-06-25', '2022-01-01', 9, 1, 23),
(20, '2016-06-24', NULL, 29, 18, 3),
(21, '2019-07-04', '2021-11-24', 29, 22, 24),
(22, '2018-08-08', '2021-02-24', 33, 1, 18),
(23, '2018-01-21', '2020-12-25', 8, 25, 13),
(24, '2018-07-06', NULL, 12, 6, 17),
(25, '2017-03-08', '2021-12-11', 42, 1, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `zanras`
--

CREATE TABLE `zanras` (
  `nr` int(11) NOT NULL,
  `pavadinimas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `zanras`
--

INSERT INTO `zanras` (`nr`, `pavadinimas`) VALUES
(1, 'Biografija'),
(2, 'Autobiografija'),
(3, 'Pasaka'),
(4, 'Detektyvas'),
(5, 'Novele'),
(6, 'Romanas'),
(7, 'Epas'),
(8, 'Poezija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autorius`
--
ALTER TABLE `autorius`
  ADD PRIMARY KEY (`nr`),
  ADD KEY `salis` (`salis`),
  ADD KEY `lytis` (`lytis`);

--
-- Indexes for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD PRIMARY KEY (`nr`,`fk_MIESTASnr`),
  ADD KEY `lytis` (`lytis`),
  ADD KEY `fk_MIESTASnr` (`fk_MIESTASnr`);

--
-- Indexes for table `kalba`
--
ALTER TABLE `kalba`
  ADD PRIMARY KEY (`nr`);

--
-- Indexes for table `knyga`
--
ALTER TABLE `knyga`
  ADD PRIMARY KEY (`nr`,`fk_KALBAnr`,`fk_ZANRASnr`,`fk_AUTORIUSnr`,`fk_LEIDYKLAnr`),
  ADD KEY `fk_KALBAnr` (`fk_KALBAnr`),
  ADD KEY `fk_ZANRASnr` (`fk_ZANRASnr`),
  ADD KEY `fk_AUTORIUSnr` (`fk_AUTORIUSnr`),
  ADD KEY `fk_LEIDYKLAnr` (`fk_LEIDYKLAnr`);

--
-- Indexes for table `leidykla`
--
ALTER TABLE `leidykla`
  ADD PRIMARY KEY (`nr`,`fk_MIESTASnr`),
  ADD KEY `salis` (`salis`),
  ADD KEY `fk_MIESTASnr` (`fk_MIESTASnr`);

--
-- Indexes for table `lytis`
--
ALTER TABLE `lytis`
  ADD PRIMARY KEY (`id_LYTIS`);

--
-- Indexes for table `miestas`
--
ALTER TABLE `miestas`
  ADD PRIMARY KEY (`nr`),
  ADD KEY `salis` (`salis`);

--
-- Indexes for table `salis`
--
ALTER TABLE `salis`
  ADD PRIMARY KEY (`id_SALIS`);

--
-- Indexes for table `skaitytojas`
--
ALTER TABLE `skaitytojas`
  ADD PRIMARY KEY (`nr`,`fk_MIESTASnr`),
  ADD KEY `lytis` (`lytis`),
  ADD KEY `fk_MIESTASnr` (`fk_MIESTASnr`);

--
-- Indexes for table `sutartis`
--
ALTER TABLE `sutartis`
  ADD PRIMARY KEY (`nr`,`fk_SKAITYTOJASnr`,`fk_DARBUOTOJASnr`,`fk_KNYGAnr`),
  ADD KEY `fk_SKAITYTOJASnr` (`fk_SKAITYTOJASnr`),
  ADD KEY `fk_DARBUOTOJASnr` (`fk_DARBUOTOJASnr`),
  ADD KEY `fk_KNYGAnr` (`fk_KNYGAnr`);

--
-- Indexes for table `zanras`
--
ALTER TABLE `zanras`
  ADD PRIMARY KEY (`nr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autorius`
--
ALTER TABLE `autorius`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `kalba`
--
ALTER TABLE `kalba`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `knyga`
--
ALTER TABLE `knyga`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `leidykla`
--
ALTER TABLE `leidykla`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lytis`
--
ALTER TABLE `lytis`
  MODIFY `id_LYTIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `miestas`
--
ALTER TABLE `miestas`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salis`
--
ALTER TABLE `salis`
  MODIFY `id_SALIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `skaitytojas`
--
ALTER TABLE `skaitytojas`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `sutartis`
--
ALTER TABLE `sutartis`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `zanras`
--
ALTER TABLE `zanras`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `autorius`
--
ALTER TABLE `autorius`
  ADD CONSTRAINT `autorius_ibfk_1` FOREIGN KEY (`salis`) REFERENCES `salis` (`id_SALIS`),
  ADD CONSTRAINT `autorius_ibfk_2` FOREIGN KEY (`lytis`) REFERENCES `lytis` (`id_LYTIS`);

--
-- Apribojimai lentelei `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD CONSTRAINT `darbuotojas_ibfk_1` FOREIGN KEY (`lytis`) REFERENCES `lytis` (`id_LYTIS`),
  ADD CONSTRAINT `darbuotojas_ibfk_2` FOREIGN KEY (`fk_MIESTASnr`) REFERENCES `miestas` (`nr`);

--
-- Apribojimai lentelei `knyga`
--
ALTER TABLE `knyga`
  ADD CONSTRAINT `knyga_ibfk_1` FOREIGN KEY (`fk_KALBAnr`) REFERENCES `kalba` (`nr`),
  ADD CONSTRAINT `knyga_ibfk_2` FOREIGN KEY (`fk_ZANRASnr`) REFERENCES `zanras` (`nr`),
  ADD CONSTRAINT `knyga_ibfk_3` FOREIGN KEY (`fk_AUTORIUSnr`) REFERENCES `autorius` (`nr`),
  ADD CONSTRAINT `knyga_ibfk_4` FOREIGN KEY (`fk_LEIDYKLAnr`) REFERENCES `leidykla` (`nr`);

--
-- Apribojimai lentelei `leidykla`
--
ALTER TABLE `leidykla`
  ADD CONSTRAINT `leidykla_ibfk_1` FOREIGN KEY (`salis`) REFERENCES `salis` (`id_SALIS`),
  ADD CONSTRAINT `leidykla_ibfk_2` FOREIGN KEY (`fk_MIESTASnr`) REFERENCES `miestas` (`nr`);

--
-- Apribojimai lentelei `miestas`
--
ALTER TABLE `miestas`
  ADD CONSTRAINT `miestas_ibfk_1` FOREIGN KEY (`salis`) REFERENCES `salis` (`id_SALIS`);

--
-- Apribojimai lentelei `skaitytojas`
--
ALTER TABLE `skaitytojas`
  ADD CONSTRAINT `skaitytojas_ibfk_1` FOREIGN KEY (`lytis`) REFERENCES `lytis` (`id_LYTIS`),
  ADD CONSTRAINT `skaitytojas_ibfk_2` FOREIGN KEY (`fk_MIESTASnr`) REFERENCES `miestas` (`nr`);

--
-- Apribojimai lentelei `sutartis`
--
ALTER TABLE `sutartis`
  ADD CONSTRAINT `sutartis_ibfk_1` FOREIGN KEY (`fk_SKAITYTOJASnr`) REFERENCES `skaitytojas` (`nr`),
  ADD CONSTRAINT `sutartis_ibfk_2` FOREIGN KEY (`fk_DARBUOTOJASnr`) REFERENCES `darbuotojas` (`nr`),
  ADD CONSTRAINT `sutartis_ibfk_3` FOREIGN KEY (`fk_KNYGAnr`) REFERENCES `knyga` (`nr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
