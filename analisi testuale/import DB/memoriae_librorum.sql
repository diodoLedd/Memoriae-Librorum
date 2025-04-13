-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Apr 13, 2025 alle 18:42
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memoriae_librorum`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tblAutori`
--

CREATE TABLE `tblAutori` (
  `idAutore` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tblAutori`
--

INSERT INTO `tblAutori` (`idAutore`, `nome`, `cognome`) VALUES
(1, 'J.K.', 'Rowling'),
(2, 'George', 'Orwell'),
(3, 'Jane', 'Austen'),
(4, 'Mark', 'Twain'),
(5, 'Isaac', 'Asimov'),
(6, 'Stephen', 'King'),
(7, 'Agatha', 'Christie'),
(8, 'Haruki', 'Murakami'),
(9, 'Ernest', 'Hemingway'),
(10, 'Gabriel', 'García Márquez'),
(11, 'Leo', 'Tolstoy'),
(12, 'Franz', 'Kafka'),
(13, 'Paulo', 'Coelho'),
(14, 'Margaret', 'Atwood'),
(15, 'Toni', 'Morrison'),
(16, 'Emily', 'Bronte'),
(17, 'Charles', 'Dickens'),
(18, 'Dante', 'Alighieri'),
(19, 'Omero', 'Omero'),
(20, 'Italo', 'Calvino'),
(21, 'Umberto', 'Eco'),
(22, 'J.R.R.', 'Tolkien'),
(23, 'Dan', 'Brown'),
(24, 'Albert', 'Camus'),
(25, 'Oscar', 'Wilde'),
(26, 'Suzanne', 'Collins');

-- --------------------------------------------------------

--
-- Struttura della tabella `tblCitazioni`
--

CREATE TABLE `tblCitazioni` (
  `idCitazione` int(11) NOT NULL,
  `testo` text NOT NULL,
  `pagina` int(11) NOT NULL,
  `tracciamentoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tblGeneri`
--

CREATE TABLE `tblGeneri` (
  `idGenere` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tblGeneri`
--

INSERT INTO `tblGeneri` (`idGenere`, `nome`) VALUES
(1, 'Fantasy'),
(2, 'Distopia'),
(3, 'Romanzo'),
(4, 'Avventura'),
(5, 'Fantascienza'),
(6, 'Giallo'),
(7, 'Thriller'),
(8, 'Narrativa'),
(9, 'Storico'),
(10, 'Drammatico'),
(11, 'Biografico'),
(12, 'Classico'),
(13, 'Filosofico'),
(14, 'Horror'),
(15, 'Satira'),
(16, 'Realismo Magico'),
(17, 'Poesia'),
(18, 'Mitologia');

-- --------------------------------------------------------

--
-- Struttura della tabella `tblLibri`
--

CREATE TABLE `tblLibri` (
  `idLibro` int(11) NOT NULL,
  `titolo` text NOT NULL,
  `copertina` text DEFAULT NULL,
  `genereId` int(11) NOT NULL,
  `autoreId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tblLibri`
--

INSERT INTO `tblLibri` (`idLibro`, `titolo`, `copertina`, `genereId`, `autoreId`) VALUES
(1, 'Harry Potter e la Pietra Filosofale', 'img/copertine-libri/harry_potter1.jpg', 1, 1),
(2, '1984', 'img/copertine-libri/1984.jpg', 2, 2),
(3, 'Orgoglio e Pregiudizio', 'img/copertine-libri/orgoglio_pregiudizio.jpg', 3, 3),
(4, 'Le avventure di Tom Sawyer', 'img/copertine-libri/tom_sawyer.jpg', 4, 4),
(5, 'Fondazione', 'img/copertine-libri/fondazione.jpg', 5, 5),
(6, 'Shining', 'img/copertine-libri/shining.jpg', 14, 6),
(7, 'Assassinio sull\'Orient Express', 'img/copertine-libri/orient_express.jpg', 6, 7),
(8, 'Norwegian Wood', 'img/copertine-libri/norwegian_wood.jpg', 3, 8),
(9, 'Il vecchio e il mare', 'img/copertine-libri/vecchio_mare.jpg', 10, 9),
(10, 'Cent\'anni di solitudine', 'img/copertine-libri/cent_anni.jpg', 16, 10),
(11, 'Guerra e Pace', 'img/copertine-libri/guerra_pace.jpg', 9, 11),
(12, 'La metamorfosi', 'img/copertine-libri/metamorfosi.jpg', 12, 12),
(13, 'L\'alchimista', 'img/copertine-libri/alchimista.jpg', 3, 13),
(14, 'Il racconto dell\'ancella', 'img/copertine-libri/ancella.jpg', 2, 14),
(15, 'Amatissima', 'img/copertine-libri/amatissima.jpg', 10, 15),
(16, 'Carrie', 'img/copertine-libri/carrie.jpg', 14, 6),
(17, 'Dieci piccoli indiani', 'img/copertine-libri/dieci_piccoli_indiani.jpg', 6, 7),
(18, 'Kafka sulla spiaggia', 'images/copertine-libri/kafka_spiaggia.jpg', 3, 8),
(19, 'L\'assassino cieco', 'img/copertine-libri/assassino_cieco.jpg', 7, 14),
(20, 'Canto di Salomone', 'img/copertine-libri/salomone.jpg', 11, 15),
(21, 'Cime Tempestose', 'img/copertine-libri/cime_tempestose.jpg', 10, 16),
(22, 'Grandi Speranze', 'img/copertine-libri/grandi_speranze.jpg', 3, 17),
(23, 'Divina Commedia', 'img/copertine-libri/divina_commedia.jpg', 13, 18),
(24, 'Odissea', 'img/copertine-libri/odissea.jpg', 18, 19),
(25, 'Il Barone Rampante', 'img/copertine-libri/barone_rampante.jpg', 8, 20),
(26, 'Il nome della rosa', 'img/copertine-libri/nome_rosa.jpg', 6, 21),
(27, 'Il Signore degli Anelli', 'img/copertine-libri/signore_anelli.jpg', 1, 22),
(28, 'Il Codice Da Vinci', 'img/copertine-libri/codice_da_vinci.jpg', 7, 23),
(29, 'Lo Straniero', 'img/copertine-libri/straniero.jpg', 13, 24),
(30, 'Il ritratto di Dorian Gray', 'img/copertine-libri/dorian_gray.jpg', 12, 25),
(31, 'Harry Potter e la Camera dei Segreti', 'img/copertine-libri/harry_potter2.jpg', 1, 1),
(32, 'La fattoria degli animali', 'img/copertine-libri/fattoria_animali.jpg', 2, 2),
(33, 'Emma', 'img/copertine-libri/emma.jpg', 3, 3),
(34, 'Un americano alla corte di Re Artù', 'img/copertine-libri/re_artu.jpg', 4, 4),
(35, 'Io, Robot', 'img/copertine-libri/io_robot.jpg', 5, 5),
(36, 'IT', 'img/copertine-libri/it.jpg', 14, 6),
(37, 'Poirot a Styles Court', 'img/copertine-libri/poirot_styles.jpg', 6, 7),
(38, '1Q84', 'img/copertine-libri/1q84.jpg', 3, 8),
(39, 'Addio alle armi', 'img/copertine-libri/addio_armi.jpg', 10, 9),
(40, 'L\'autunno del patriarca', 'img/copertine-libri/autunno_patriarca.jpg', 16, 10),
(41, 'La morte di Ivan Il\'ič', 'img/copertine-libri/ivan_ilic.jpg', 10, 11),
(42, 'America', 'img/copertine-libri/america.jpg', 12, 12),
(43, 'Veronika decide di morire', 'img/copertine-libri/veronika_muore.jpg', 3, 13),
(44, 'L\'anno del diluvio', 'img/copertine-libri/anno_diluvio.jpg', 2, 14),
(45, 'The Bluest Eye', 'img/copertine-libri/bluest_eye.jpg', 11, 15),
(46, 'Agnes Grey', 'img/copertine-libri/agnes_grey.jpg', 10, 16),
(47, 'Oliver Twist', 'img/copertine-libri/oliver_twist.jpg', 3, 17),
(48, 'Vita nuova', 'img/copertine-libri/vita_nuova.jpg', 13, 18),
(49, 'Iliade', 'img/copertine-libri/iliade.jpg', 18, 19),
(50, 'Le città invisibili', 'img/copertine-libri/citta_invisibili.jpg', 8, 20),
(51, 'Baudolino', 'img/copertine-libri/baudolino.jpg', 9, 21),
(52, 'Lo Hobbit', 'img/copertine-libri/hobbit.jpg', 1, 22),
(53, 'Angeli e demoni', 'img/copertine-libri/angeli_demoni.jpg', 7, 23),
(54, 'La peste', 'img/copertine-libri/peste.jpg', 13, 24),
(55, 'Il fantasma di Canterville', 'img/copertine-libri/canterville.jpg', 15, 25),
(56, 'Harry Potter e il Prigioniero di Azkaban', 'img/copertine-libri/harry_potter3.jpg', 1, 1),
(57, 'Harry Potter e il Calice di Fuoco', 'img/copertine-libri/harry_potter4.jpg', 1, 1),
(58, 'Harry Potter e l\'Ordine della Fenice', 'img/copertine-libri/harry_potter5.jpg', 1, 1),
(59, 'Harry Potter e il Principe Mezzosangue', 'img/copertine-libri/harry_potter6.jpg', 1, 1),
(60, 'Harry Potter e i Doni della Morte', 'img/copertine-libri/harry_potter7.jpg', 1, 1),
(61, 'Hunger Games', 'img/copertine-libri/hunger_games1.jpg', 2, 26),
(62, 'Hunger Games: La ragazza di fuoco', 'img/copertine-libri/hunger_games2.jpg', 2, 26),
(63, 'Hunger Games: Il canto della rivolta', 'img/copertine-libri/hunger_games3.jpg', 2, 26);

-- --------------------------------------------------------

--
-- Struttura della tabella `tblTracciamenti`
--

CREATE TABLE `tblTracciamenti` (
  `idTracciamento` int(11) NOT NULL,
  `stato` char(1) NOT NULL,
  `dataInizio` date DEFAULT NULL,
  `dataFine` date DEFAULT NULL,
  `voto` char(1) DEFAULT NULL,
  `recensione` text DEFAULT NULL,
  `libroId` int(11) NOT NULL,
  `utenteId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tblUtenti`
--

CREATE TABLE `tblUtenti` (
  `idUtente` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `email` text NOT NULL,
  `passwordHash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tblAutori`
--
ALTER TABLE `tblAutori`
  ADD PRIMARY KEY (`idAutore`);

--
-- Indici per le tabelle `tblCitazioni`
--
ALTER TABLE `tblCitazioni`
  ADD PRIMARY KEY (`idCitazione`),
  ADD KEY `tracciamentoId` (`tracciamentoId`);

--
-- Indici per le tabelle `tblGeneri`
--
ALTER TABLE `tblGeneri`
  ADD PRIMARY KEY (`idGenere`);

--
-- Indici per le tabelle `tblLibri`
--
ALTER TABLE `tblLibri`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `genereId` (`genereId`),
  ADD KEY `autoreId` (`autoreId`);

--
-- Indici per le tabelle `tblTracciamenti`
--
ALTER TABLE `tblTracciamenti`
  ADD PRIMARY KEY (`idTracciamento`),
  ADD KEY `libroId` (`libroId`),
  ADD KEY `utenteId` (`utenteId`);

--
-- Indici per le tabelle `tblUtenti`
--
ALTER TABLE `tblUtenti`
  ADD PRIMARY KEY (`idUtente`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tblAutori`
--
ALTER TABLE `tblAutori`
  MODIFY `idAutore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `tblCitazioni`
--
ALTER TABLE `tblCitazioni`
  MODIFY `idCitazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `tblGeneri`
--
ALTER TABLE `tblGeneri`
  MODIFY `idGenere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `tblLibri`
--
ALTER TABLE `tblLibri`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT per la tabella `tblTracciamenti`
--
ALTER TABLE `tblTracciamenti`
  MODIFY `idTracciamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `tblUtenti`
--
ALTER TABLE `tblUtenti`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `tblCitazioni`
--
ALTER TABLE `tblCitazioni`
  ADD CONSTRAINT `tblCitazioni_ibfk_1` FOREIGN KEY (`tracciamentoId`) REFERENCES `tblTracciamenti` (`idTracciamento`);

--
-- Limiti per la tabella `tblLibri`
--
ALTER TABLE `tblLibri`
  ADD CONSTRAINT `tblLibri_ibfk_1` FOREIGN KEY (`genereId`) REFERENCES `tblGeneri` (`idGenere`),
  ADD CONSTRAINT `tblLibri_ibfk_2` FOREIGN KEY (`autoreId`) REFERENCES `tblAutori` (`idAutore`);

--
-- Limiti per la tabella `tblTracciamenti`
--
ALTER TABLE `tblTracciamenti`
  ADD CONSTRAINT `tblTracciamenti_ibfk_1` FOREIGN KEY (`libroId`) REFERENCES `tblLibri` (`idLibro`),
  ADD CONSTRAINT `tblTracciamenti_ibfk_2` FOREIGN KEY (`utenteId`) REFERENCES `tblUtenti` (`idUtente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
