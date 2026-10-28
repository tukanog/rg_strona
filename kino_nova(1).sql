-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 28, 2026 at 07:32 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kino_nova`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy_repertuar`
--

CREATE TABLE `filmy_repertuar` (
  `id` int(11) NOT NULL,
  `nazwa_filmu` varchar(50) NOT NULL,
  `opis` varchar(3000) NOT NULL,
  `czas_trwania` int(11) DEFAULT NULL COMMENT 'Czas trwania w minutach',
  `gatunek` varchar(50) DEFAULT NULL,
  `grafika` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `filmy_repertuar`
--

INSERT INTO `filmy_repertuar` (`id`, `nazwa_filmu`, `opis`, `czas_trwania`, `gatunek`, `grafika`) VALUES
(1, 'Kapitan bomba', 'ndjiwunbuweibfhiwbfuisabfuieqbfuiasbhfuia', 90, 'Komedia', '/bomba.png'),
(2, 'Skazani na Shawshank', 'Bankier zostaje niesłusznie skazany na dożywocie i próbuje przetrwać w ciężkim więzieniu.', 142, 'Dramat', '/shawshank.jpg'),
(3, 'Mroczny Rycerz', 'Batman walczy z Jokerem, który chce pogrążyć Gotham City w całkowitym chaosie.', 152, 'Akcja', '/mroczny_rycerz.jpg'),
(4, 'Forrest Gump', 'Historia życia prostego człowieka o wielkim sercu, który bierze udział w kluczowych wydarzeniach XX wieku.', 142, 'Dramat', '/forrest_gump.jpg'),
(5, 'Matrix', 'Haker komputerowy dowiaduje się, że świat, w którym żyje, jest sztuczną symulacją.', 136, 'Sci-Fi', '/matrix.jpg'),
(6, 'Gladiator', 'Rzymski generał zostaje zdradzony, trafia do niewoli i staje się gladiatorem, by pomścić swoją rodzinę.', 155, 'Historyczny', '/gladiator.jpg'),
(7, 'Pulp Fiction', 'Przeplatające się historie z życia gangsterów, boksera i pary złodziejaszków w Los Angeles.', 154, 'Sensacyjny', '/pulp_fiction.jpg'),
(8, 'Interstellar', 'Grupa astronautów podróżuje przez tunel czasoprzestrzenny w poszukiwaniu nowego domu dla ludzkości.', 169, 'Sci-Fi', '/interstellar.jpg'),
(9, 'Władca Pierścieni: Drużyna Pierścienia', 'Hobbit Frodo wyrusza w niebezpieczną podróż, aby zniszczyć potężny pierścień zła.', 178, 'Fantasy', '/wladca_pierscieni.jpg'),
(10, 'Zielona Mila', 'Strażnik więzienny odkrywa, że jeden ze skazanych na śmierć więźniów posiada niezwykły dar uzdrawiania.', 189, 'Dramat', '/zielona_mila.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `godziny_seansow`
--

CREATE TABLE `godziny_seansow` (
  `id_seansu` int(11) NOT NULL,
  `id_filmu` int(11) NOT NULL,
  `ilosc_miejsc` int(11) NOT NULL DEFAULT 50,
  `godzina` time NOT NULL,
  `dzien_seansu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `godziny_seansow`
--

INSERT INTO `godziny_seansow` (`id_seansu`, `id_filmu`, `ilosc_miejsc`, `godzina`, `dzien_seansu`) VALUES
(1, 1, 40, '14:00:00', '2026-11-01'),
(2, 2, 60, '16:00:00', '2026-11-01'),
(3, 3, 80, '20:00:00', '2026-11-02'),
(4, 4, 50, '17:15:00', '2026-11-02'),
(5, 5, 70, '19:30:00', '2026-11-03'),
(6, 1, 50, '12:00:00', '2026-11-01'),
(7, 1, 45, '15:30:00', '2026-11-01'),
(8, 1, 60, '19:00:00', '2026-11-01'),
(9, 2, 55, '14:00:00', '2026-11-01'),
(10, 3, 70, '21:00:00', '2026-11-01'),
(11, 2, 50, '18:00:00', '2026-11-01'),
(12, 2, 50, '18:00:00', '2026-11-02'),
(13, 2, 50, '18:00:00', '2026-11-03'),
(14, 2, 50, '18:00:00', '2026-11-04');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id_rezerwacji` int(11) NOT NULL,
  `id_seansu` int(11) NOT NULL,
  `ilosc_biletow` int(11) NOT NULL DEFAULT 1,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `rezerwacje`
--

INSERT INTO `rezerwacje` (`id_rezerwacji`, `id_seansu`, `ilosc_biletow`, `imie`, `nazwisko`, `email`) VALUES
(1, 1, 2, 'Jan', 'Kowalski', 'jan@kowalski.pl'),
(2, 2, 3, 'Anna', 'Nowak', 'anna@nowak.pl'),
(3, 3, 1, 'Piotr', 'Zieliński', 'piotr@zielinski.pl'),
(4, 4, 4, 'Katarzyna', 'Wiśniewska', 'kasia@wisniewska.pl'),
(5, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(6, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(7, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(8, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(9, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(10, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(11, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(12, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(13, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl'),
(14, 1, 1, 'Adam', 'Nowak', 'adam@nowak.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) NOT NULL,
  `haslo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `nazwa`, `haslo`) VALUES
(1, 'admin', 'adminNOVA');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `filmy_repertuar`
--
ALTER TABLE `filmy_repertuar`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `godziny_seansow`
--
ALTER TABLE `godziny_seansow`
  ADD PRIMARY KEY (`id_seansu`),
  ADD KEY `idx_id_filmu` (`id_filmu`);

--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id_rezerwacji`),
  ADD KEY `idx_id_seansu` (`id_seansu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmy_repertuar`
--
ALTER TABLE `filmy_repertuar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `godziny_seansow`
--
ALTER TABLE `godziny_seansow`
  MODIFY `id_seansu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id_rezerwacji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `godziny_seansow`
--
ALTER TABLE `godziny_seansow`
  ADD CONSTRAINT `fk_seanse_filmy` FOREIGN KEY (`id_filmu`) REFERENCES `filmy_repertuar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD CONSTRAINT `fk_rezerwacje_seanse` FOREIGN KEY (`id_seansu`) REFERENCES `godziny_seansow` (`id_seansu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
