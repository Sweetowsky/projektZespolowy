-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Sty 2019, 22:17
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
-- Baza danych: `forum4`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankieta`
--

CREATE TABLE `ankieta` (
  `id_ankieta` int(8) NOT NULL,
  `temat` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `pytanie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci,
  `data_rozpoczecia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_zakonczenia` timestamp NULL DEFAULT NULL,
  `widocznosc` tinyint(1) DEFAULT NULL,
  `id_tworcy` int(8) NOT NULL,
  `opcjaA` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `opcjaB` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `opcjaC` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `glosA` int(11) DEFAULT '0',
  `glosB` int(11) DEFAULT '0',
  `glosC` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `ankieta`
--

INSERT INTO `ankieta` (`id_ankieta`, `temat`, `pytanie`, `opis`, `data_rozpoczecia`, `data_zakonczenia`, `widocznosc`, `id_tworcy`, `opcjaA`, `opcjaB`, `opcjaC`, `glosA`, `glosB`, `glosC`) VALUES
(2, 'Budowa placu zabaw', 'Czy budować plac zabaw?', '', '2019-01-06 15:28:22', NULL, 1, 3, 'Tak', 'Nie', 'Bez znaczenia', 12, 1, 7),
(23, 'Zwierzęta', 'Czy właściciele powinni sprzątać po swoim psie?', '', '2019-01-06 23:00:00', '2019-01-30 23:00:00', 1, 4, 'Tak', 'Nie', 'Obojętne', 3, 1, 1),
(24, 'Sprawy organizacyjne', 'Czy ankiety na forum to dobry pomysł?', '', '2019-01-09 23:00:00', '2019-01-10 23:00:00', 1, 3, 'Tak', 'Nie', 'Sprzedam opla', 5, 1, 1),
(32, 'Segregacja śmieci ', 'Czy zamierza Pan/ Pani segregować śmieci?', '', '2019-01-07 23:00:00', '2019-01-12 23:00:00', 1, 4, 'Tak', 'Nie', '', 5, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glos`
--

CREATE TABLE `glos` (
  `id_glosu` int(8) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_uzytkownika` int(8) NOT NULL,
  `id_ankiety` int(8) NOT NULL,
  `id_odpowiedzi` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz`
--

CREATE TABLE `komentarz` (
  `id_komentarz` int(8) NOT NULL,
  `opis` varchar(300) COLLATE utf8mb4_polish_ci NOT NULL,
  `data_wstawienia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_uzytkownika` int(8) NOT NULL,
  `id_postu` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `komentarz`
--

INSERT INTO `komentarz` (`id_komentarz`, `opis`, `data_wstawienia`, `id_uzytkownika`, `id_postu`) VALUES
(10, 'To prawda. Zgadzam się !!!', '2019-01-14 21:03:07', 4, 8),
(11, 'Myślę, że dobrym pomysłem byłoby stworzenie ankiety odnośnie segregacji odpadów.', '2019-01-14 21:03:54', 4, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `id` int(8) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` varchar(60) COLLATE utf8mb4_polish_ci NOT NULL,
  `imie` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `tryb` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `logowanie`
--

INSERT INTO `logowanie` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `email`, `tryb`) VALUES
(3, 'admin', '$2y$10$lb8B1T8J3j/tqCgIQ2s8VuulB5LxrdDthrVo9MTCTbt/tgb1dd75m', 'Bartłomiej', 'Słodkowski', 'bartlomiejslodkowski@gmail.com', NULL),
(4, 'user1', '$2y$10$JNaJ/NY/oR7213L0A9tD1.ZMKtGFvA8p0KtpuLKundCTFUp5tI3i.', 'Jack', 'Daniels', 'jack.d@o2.pl', NULL),
(5, 'user2', '$2y$10$uTbzxLgFsq3xd1Ix96hPSOJu9romXFcgHrAOh1X94FG7pikW1s0wy', 'Kasi', 'Kowalska', 'user2@o2.pl', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedz`
--

CREATE TABLE `odpowiedz` (
  `id_odpowiedz` int(8) NOT NULL,
  `odpowiedz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `id_ankiety` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `id_post` int(8) NOT NULL,
  `temat` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `data_rozpoczecia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_zakoczenia` timestamp NULL DEFAULT NULL,
  `id_tworcy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`id_post`, `temat`, `opis`, `data_rozpoczecia`, `data_zakoczenia`, `id_tworcy`) VALUES
(5, 'Budowa placu zabaw', 'Zapraszam do dyskusji w sprawie budowy placu zabaw na naszym osiedlu.', '2018-12-03 18:01:07', NULL, 4),
(7, 'Budowa kostki brukowej', 'Witam wszystkich. Zapraszam do dyskusji w sprawie budowy kostki brukowej na naszym osiedlu', '2019-01-14 21:00:45', NULL, 3),
(8, 'Segregacja śmieci ', 'Witam Proszę o odpowiednią segregacje śmieci. Gdyż są one wrzucane do złych pojemników', '2019-01-14 21:02:18', NULL, 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  ADD PRIMARY KEY (`id_ankieta`),
  ADD KEY `fk_foreign_key_id_tworcy` (`id_tworcy`);

--
-- Indeksy dla tabeli `glos`
--
ALTER TABLE `glos`
  ADD PRIMARY KEY (`id_glosu`),
  ADD KEY `fk_foreign_key_id_ankiety` (`id_ankiety`),
  ADD KEY `fk_foreign_key_id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `fk_foreign_key_id_odpowiedzi` (`id_odpowiedzi`);

--
-- Indeksy dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  ADD PRIMARY KEY (`id_komentarz`),
  ADD KEY `fk_foreign_key_id_postu` (`id_postu`),
  ADD KEY `fk_foreign_key_id_uzytkownika_komentarz` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  ADD PRIMARY KEY (`id_odpowiedz`),
  ADD KEY `fk_foreign_key_id_ankiety_odp` (`id_ankiety`);

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
  MODIFY `id_ankieta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `glos`
--
ALTER TABLE `glos`
  MODIFY `id_glosu` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  MODIFY `id_komentarz` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  MODIFY `id_odpowiedz` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  ADD CONSTRAINT `fk_foreign_key_id_tworcy` FOREIGN KEY (`id_tworcy`) REFERENCES `logowanie` (`id`);

--
-- Ograniczenia dla tabeli `glos`
--
ALTER TABLE `glos`
  ADD CONSTRAINT `fk_foreign_key_id_ankiety` FOREIGN KEY (`id_ankiety`) REFERENCES `ankieta` (`id_ankieta`),
  ADD CONSTRAINT `fk_foreign_key_id_odpowiedzi` FOREIGN KEY (`id_odpowiedzi`) REFERENCES `odpowiedz` (`id_odpowiedz`),
  ADD CONSTRAINT `fk_foreign_key_id_uzytkownika` FOREIGN KEY (`id_uzytkownika`) REFERENCES `logowanie` (`id`);

--
-- Ograniczenia dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  ADD CONSTRAINT `fk_foreign_key_id_postu` FOREIGN KEY (`id_postu`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `fk_foreign_key_id_uzytkownika_komentarz` FOREIGN KEY (`id_uzytkownika`) REFERENCES `logowanie` (`id`);

--
-- Ograniczenia dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  ADD CONSTRAINT `fk_foreign_key_id_ankiety_odp` FOREIGN KEY (`id_ankiety`) REFERENCES `ankieta` (`id_ankieta`);

--
-- Ograniczenia dla tabeli `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_tworcy`) REFERENCES `logowanie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
