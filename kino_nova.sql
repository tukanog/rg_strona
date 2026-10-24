-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 24, 2026 at 05:04 PM
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
  `grafika` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `filmy_repertuar`
--

INSERT INTO `filmy_repertuar` (`id`, `nazwa_filmu`, `opis`, `grafika`) VALUES
(1, 'Kapitan bomba', 'ndjiwunbuweibfhiwbfuisabfuieqbfuiasbhfuia', '/bomba.png'),
(2, 'Skazani na Shawshank', 'Bankier zostaje niesłusznie skazany na dożywocie i próbuje przetrwać w ciężkim więzieniu.', '/shawshank.jpg'),
(3, 'Mroczny Rycerz', 'Batman walczy z Jokerem, który chce pogrążyć Gotham City w całkowitym chaosie.', '/mroczny_rycerz.jpg'),
(4, 'Forrest Gump', 'Historia życia prostego człowieka o wielkim sercu, który bierze udział w kluczowych wydarzeniach XX wieku.', '/forrest_gump.jpg'),
(5, 'Matrix', 'Haker komputerowy dowiaduje się, że świat, w którym żyje, jest sztuczną symulacją.', '/matrix.jpg'),
(6, 'Gladiator', 'Rzymski generał zostaje zdradzony, trafia do niewoli i staje się gladiatorem, by pomścić swoją rodzinę.', '/gladiator.jpg'),
(7, 'Pulp Fiction', 'Przeplatające się historie z życia gangsterów, boksera i pary złodziejaszków w Los Angeles.', '/pulp_fiction.jpg'),
(8, 'Interstellar', 'Grupa astronautów podróżuje przez tunel czasoprzestrzenny w poszukiwaniu nowego domu dla ludzkości.', '/interstellar.jpg'),
(9, 'Władca Pierścieni: Drużyna Pierścienia', 'Hobbit Frodo wyrusza w niebezpieczną podróż, aby zniszczyć potężny pierścień zła.', '/wladca_pierscieni.jpg'),
(10, 'Zielona Mila', 'Strażnik więzienny odkrywa, że jeden ze skazanych na śmierć więźniów posiada niezwykły dar uzdrawiania.', '/zielona_mila.jpg');

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
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
