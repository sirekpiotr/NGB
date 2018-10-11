-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Paź 2018, 14:49
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ngb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcja`
--

CREATE TABLE `transakcja` (
  `id_transakcji` int(11) NOT NULL,
  `id_odbiorcy` int(11) NOT NULL,
  `id_adresata` int(11) NOT NULL,
  `kwota` double NOT NULL,
  `tytul` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `transakcja`
--

INSERT INTO `transakcja` (`id_transakcji`, `id_odbiorcy`, `id_adresata`, `kwota`, `tytul`) VALUES
(18, 12, 1, 250.99, 'UX project'),
(19, 4, 2, 120.5, 'Money for hotel'),
(20, 3, 2, 499.99, 'Rent for house'),
(21, 2, 13, 450.99, 'Trip to Bulgaria'),
(22, 20, 4, 120.4, 'Airbnb in Paris'),
(23, 5, 21, 999.99, 'iPhone X'),
(24, 18, 17, 1599.99, 'Space for advert in newspaper'),
(25, 1, 17, 1999.99, 'Mobile app project'),
(26, 20, 19, 399, ' Prepayment for new workspace'),
(27, 4, 14, 1200.99, 'Work ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `user_id` int(11) NOT NULL,
  `password` varchar(99) NOT NULL,
  `imie` varchar(99) NOT NULL,
  `nazwisko` varchar(99) NOT NULL,
  `saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`user_id`, `password`, `imie`, `nazwisko`, `saldo`) VALUES
(1, 'zaq1@WSX', 'Jan', 'Kowalski', 2777.4),
(2, 'qwerty', 'Piotr', 'Nowak', 2358.53),
(3, 'qwerty', 'Michal', 'Kowal', 2201.08),
(4, 'zaq1@WSX', 'Mateusz', 'Kaluza', 2652.08),
(5, 'zaq1@WSX', 'Agata', 'Zuraw', 4478.86),
(12, 'qwerty', 'Oliwier', 'Slusarczyk', 2378.54),
(13, '123456', 'Daniel', 'Filipek', 5825.81),
(14, 'qwerty', 'Waclaw', 'Zima', 9362.51),
(16, 'qwerty', 'Nina', 'Szewc', 3456.89),
(17, 'zaqwsx', 'Olga', 'Jez', 19765.9),
(18, 'zuza123', 'Zuzanna', 'Sadowska', 5725.78),
(19, '123456', 'Emilia', 'Niemiec', 801.67),
(20, 'qazwsx', 'Aleksander', 'Mencher', 7107.7),
(21, 'darek', 'Darek', 'Czajka', 6990.46);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `transakcja`
--
ALTER TABLE `transakcja`
  ADD PRIMARY KEY (`id_transakcji`),
  ADD KEY `id_odbiorcy` (`id_odbiorcy`),
  ADD KEY `id_adresata` (`id_adresata`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `transakcja`
--
ALTER TABLE `transakcja`
  MODIFY `id_transakcji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `transakcja`
--
ALTER TABLE `transakcja`
  ADD CONSTRAINT `transakcja_ibfk_1` FOREIGN KEY (`id_odbiorcy`) REFERENCES `uzytkownik` (`user_id`),
  ADD CONSTRAINT `transakcja_ibfk_2` FOREIGN KEY (`id_adresata`) REFERENCES `uzytkownik` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
