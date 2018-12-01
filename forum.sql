-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Gru 2018, 15:57
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `forum`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankieta`
--

CREATE TABLE `ankieta` (
  `id_ankieta` int(8) NOT NULL,
  `temat` text COLLATE utf8mb4_polish_ci,
  `pytanie` text COLLATE utf8mb4_polish_ci,
  `opis` text COLLATE utf8mb4_polish_ci,
  `data_rozpoczecia` date DEFAULT NULL,
  `data_zakonczenia` date DEFAULT NULL,
  `widocznosc` tinyint(1) DEFAULT NULL,
  `id_tworcy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz`
--

CREATE TABLE `komentarz` (
  `id_komentarz` int(8) NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci,
  `data_wstawienia` date DEFAULT NULL,
  `id_uzytkownika` int(8) DEFAULT NULL,
  `id_postu` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `id` int(8) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` varchar(60) COLLATE utf8mb4_polish_ci NOT NULL,
  `imie` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `nazwisko` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `tryb` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `logowanie`
--

INSERT INTO `logowanie` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `email`, `tryb`) VALUES
(3, 'admin', '$2y$10$lb8B1T8J3j/tqCgIQ2s8VuulB5LxrdDthrVo9MTCTbt/tgb1dd75m', 'Bartłomiej', 'Słodkowski', 'bartlomiejslodkowski@gmail.com', NULL),
(4, 'user1', '$2y$10$JNaJ/NY/oR7213L0A9tD1.ZMKtGFvA8p0KtpuLKundCTFUp5tI3i.', 'Jack', 'Daniels', 'jack.d@o2.pl', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `id_post` int(8) NOT NULL,
  `temat` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `data_rozpoczecia` date DEFAULT NULL,
  `data_zakoczenia` date DEFAULT NULL,
  `id_tworcy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`id_post`, `temat`, `opis`, `data_rozpoczecia`, `data_zakoczenia`, `id_tworcy`) VALUES
(1, 'Pierwszy testowy post', 'To jest przykładowy opis. To jest przykładowy opis. To jest przykładowy opis. To jest przykładowy opis. To jest przykładowy opis. To jest przykładowy opis. To jest przykładowy opis. To jest przykładowy opis. ', '2018-12-01', NULL, 3),
(2, 'Drugi temat', 'bla bla bla bla bla bla bla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla bla', '2018-12-01', NULL, 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  ADD PRIMARY KEY (`id_ankieta`);

--
-- Indeksy dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  ADD PRIMARY KEY (`id_komentarz`);

--
-- Indeksy dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_tworcy` (`id_tworcy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  MODIFY `id_ankieta` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  MODIFY `id_komentarz` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_tworcy`) REFERENCES `logowanie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
