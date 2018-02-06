-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Sty 2018, 10:30
-- Wersja serwera: 10.1.29-MariaDB
-- Wersja PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `contactsdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `label`) VALUES
(1, 'Prywatne'),
(2, 'Służbowe');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `note` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `surname`, `phone`, `email`, `address`, `categoryId`, `note`) VALUES
(1, 'Jan', 'Myśliński', '600600600', 'j.mys@gmail.com', 'Srebrnikowa 66/6', 1, NULL),
(2, 'Alicja', 'Strąkiewicz', 'Gdańska 15/4', 'a.strak@wp.pl', '500500500', 1, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `number_contacts`
--

CREATE TABLE `number_contacts` (
  `id_user` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `number_contacts`
--

INSERT INTO `number_contacts` (`id_user`, `id_contact`) VALUES
(23, 1),
(23, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `name`, `surname`, `phone`, `email`, `password`) VALUES
(23, 'pawel', 'ged', 0, 'pawel@wp.pl', '$2y$10$YjRTimhlmjpnE5Ag9SYWpuC.IC//sl7UorQHhbjlUOsLCEow9.QU.'),
(24, 'Paulina', 'Nero', 537032318, 's_paulina@wp.pl', '$2y$10$qoFPFd.KQPmQYeQSGQ/wpuMaHuWYHNUoLL6gA9XcIPhD5NL45KeeS'),
(25, 'piotr', 'kowalski', 123456789, 'piotr@wp.pl', '$2y$10$iGs7EQSakLTswU0ZGsZbqu3usdoxlchn1lcOxAnrJpO22ktYQ1tSe'),
(26, 'piotr', 'ged', 2147483647, 'piot2r@wp.pl', '$2y$10$b3EDSnzi0Wvmr27hmFQHAeXlxO3t4eOI1eWoCmzLvgq3BweibYx0O'),
(27, 'aaa', 'aaa', 1234567, 'aaa@wp.pl', '$2y$10$T.Z3gPOrV19vO6O1A3FcseWNogUCSA4t/M4sCuQTdmfgHvSwT4Ji6'),
(28, 'bbb', 'bbb', 12334232, 'bbb@wp.pl', '$2y$10$UiFiDCBd0yndojxez52bqO/LM07egVf.bED75tUj4Eaji8drYODwm'),
(29, 'bbb', 'bbb', 12334232, 'bbbbb@wp.pl', '$2y$10$Wcxdg0tyfxSRWPpdgKTr.OrKGtKkS5eybkDQC8Cq/Up9gc.Dx9qAa'),
(30, 'bbb', 'eee', 2222222, 'qwerty@wp.pl', '$2y$10$uGEw0fUzqyeO2gYGCRTXGOexCjdnRSV74rKzmUykgrRaidiWYxbt2');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main` (`name`,`surname`,`email`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `number_contacts`
--
ALTER TABLE `number_contacts`
  ADD KEY `id_user` (`id_user`,`id_contact`),
  ADD KEY `id_contact` (`id_contact`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `number_contacts`
--
ALTER TABLE `number_contacts`
  ADD CONSTRAINT `number_contacts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `number_contacts_ibfk_2` FOREIGN KEY (`id_contact`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
