-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 10. pro 2017, 23:17
-- Verze serveru: 10.1.26-MariaDB
-- Verze PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `databaze_pro_web`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `filmy`
--

CREATE TABLE `filmy` (
  `id_filmu` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `popis` longtext COLLATE utf8_czech_ci NOT NULL,
  `delkaFilmu` time NOT NULL,
  `trailer` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `aktivni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `filmy`
--

INSERT INTO `filmy` (`id_filmu`, `nazev`, `popis`, `delkaFilmu`, `trailer`, `aktivni`) VALUES
(4, 'Robin Hood', 'Robin (Taron Egerton), válkou zocelený bojovník, se vrací z křižáckých výprav, aby společně s svým maurským přítelem Malým Johnem (Jamie Foxx) povstal proti zkorumpované anglické vládě v moderní vzrušující akční podívané plné zběsilých bojů, epické válečné choreografie i nadčasové romantiky.(Vertical Ent.)', '01:57:00', 'https://www.youtube.com/embed/PiwLc2KaBBc', 1),
(5, 'Aquaman', 'Filmový příběh o populárním superhrdinovi ze stáje DC Comics odhaluje původ Arthura Curryho (Jason Momoa), napůl člověka, napůl obyvatele bájné Atlantidy, kterého jeho životní cesta přiměje čelit pravdě nejen o tom, kým ve skutečnosti je, ale zároveň prověří, zda-li je hoden stát se tím, pro co byl zrozen… králem.', '02:18:00', 'https://www.youtube.com/embed/WDkg3h8PCVU', 1),
(6, 'Bohemian Rhapsody', 'Film Bohemian Rhapsody je oslavou rockové skupiny Queen, jejich hudby a především Freddieho Mercuryho, který svou tvorbou i životem vzdoroval všem myslitelným stereotypům, díky čemuž se stal jedním z nejvýraznějších umělců na světě. Snímek mapuje raketový vzestup nekonvenční skupiny prostřednictvím jejich revolučního zvuku a ikonických písní, jako jsou „We Will Rock You“, „We Are the Champions“ nebo právě „Bohemian Rhapsody“. Jejich příběh začíná bleskovým startem, pokračuje neřízenou životní spirálou a vrcholí nezapomenutelným, strhujícím vystoupením na koncertu Live Aid v roce 1985. Na jeho	pódiu Queen v čele se rtuťovitým Freddiem předvedli jednu z největších show v historii rocku. Jejich hudba byla a stále je ohromnou inspirací pro celý svět.', '02:10:00', 'https://www.youtube.com/embed/pQd319czy30', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `program`
--

CREATE TABLE `program` (
  `id_programu` int(11) NOT NULL,
  `datum` date NOT NULL,
  `cas` time NOT NULL,
  `film_id_filmu` int(11) NOT NULL,
  `sal_id_salu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `program`
--

INSERT INTO `program` (`id_programu`, `datum`, `cas`, `film_id_filmu`, `sal_id_salu`) VALUES
(27, '2019-04-02', '22:00:00', 5, 2),
(28, '2019-04-02', '13:30:00', 4, 1),
(29, '2019-04-03', '15:00:00', 5, 1),
(30, '2019-04-03', '14:00:00', 5, 3),
(31, '2019-04-04', '22:30:00', 6, 3),
(32, '2019-04-04', '20:00:00', 4, 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `rezervace`
--

CREATE TABLE `rezervace` (
  `id_rezervace` int(11) NOT NULL,
  `sedadlo1` int(11) DEFAULT NULL,
  `sedadlo2` int(11) DEFAULT NULL,
  `sedadlo3` int(11) DEFAULT NULL,
  `sedadlo4` int(11) DEFAULT NULL,
  `sedadlo5` int(11) DEFAULT NULL,
  `uzivatel_id_uzivatele` int(11) NOT NULL,
  `program_id_programu` int(11) NOT NULL,
  `cisloRezervace` varchar(15) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `rezervace`
--

INSERT INTO `rezervace` (`id_rezervace`, `sedadlo1`, `sedadlo2`, `sedadlo3`, `sedadlo4`, `sedadlo5`, `uzivatel_id_uzivatele`, `program_id_programu`, `cisloRezervace`) VALUES
(21, 4, 5, 6, 7, 0, 103, 28, '970464'),
(22, 13, 14, 15, 0, 0, 1001, 31, '830923'),
(26, 57, 58, 0, 0, 0, 1001, 28, '454811'),
(27, 73, 74, 75, 0, 0, 1001, 31, '640595'),
(29, 21, 22, 0, 0, 0, 99, 28, '250005');

-- --------------------------------------------------------

--
-- Struktura tabulky `saly`
--

CREATE TABLE `saly` (
  `id_salu` int(11) NOT NULL,
  `pocet_rad` int(11) NOT NULL,
  `pocet_sed_v_rade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `saly`
--

INSERT INTO `saly` (`id_salu`, `pocet_rad`, `pocet_sed_v_rade`) VALUES
(1, 6, 10),
(2, 8, 10),
(3, 12, 10);

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `uzivatele_id` int(11) NOT NULL,
  `jmeno` varchar(60) COLLATE utf8_czech_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_czech_ci DEFAULT NULL,
  `heslo` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `telefon` varchar(11) COLLATE utf8_czech_ci DEFAULT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`uzivatele_id`, `jmeno`, `email`, `heslo`, `telefon`, `admin`) VALUES
(99, 'quest', 'quest@quest.cz', '123', NULL, 0),
(103, 'admin', 'admin@admin.cz', '8cb2237d0679ca88db6464eac60da96345513964', NULL, 1),
(1001, 'Jenda', 'user@user.cz', '8cb2237d0679ca88db6464eac60da96345513964', NULL, 0);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id_filmu`);

--
-- Klíče pro tabulku `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_programu`),
  ADD KEY `fk_program` (`film_id_filmu`),
  ADD KEY `fk_sal` (`sal_id_salu`);

--
-- Klíče pro tabulku `rezervace`
--
ALTER TABLE `rezervace`
  ADD PRIMARY KEY (`id_rezervace`),
  ADD KEY `fk_id_programu` (`program_id_programu`),
  ADD KEY `fk_id_uzivatele` (`uzivatel_id_uzivatele`);

--
-- Klíče pro tabulku `saly`
--
ALTER TABLE `saly`
  ADD PRIMARY KEY (`id_salu`);

--
-- Klíče pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`uzivatele_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id_filmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `program`
--
ALTER TABLE `program`
  MODIFY `id_programu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pro tabulku `rezervace`
--
ALTER TABLE `rezervace`
  MODIFY `id_rezervace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pro tabulku `saly`
--
ALTER TABLE `saly`
  MODIFY `id_salu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `uzivatele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `fk_program` FOREIGN KEY (`film_id_filmu`) REFERENCES `filmy` (`id_filmu`),
  ADD CONSTRAINT `fk_sal` FOREIGN KEY (`sal_id_salu`) REFERENCES `saly` (`id_salu`);

--
-- Omezení pro tabulku `rezervace`
--
ALTER TABLE `rezervace`
  ADD CONSTRAINT `fk_id_programu` FOREIGN KEY (`program_id_programu`) REFERENCES `program` (`id_programu`),
  ADD CONSTRAINT `fk_id_uzivatele` FOREIGN KEY (`uzivatel_id_uzivatele`) REFERENCES `uzivatele` (`uzivatele_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
