-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Apr 2016 um 15:50
-- Server-Version: 10.1.10-MariaDB
-- PHP-Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `zeiterfassung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `geo`
--

CREATE TABLE `geo` (
  `id` int(11) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `geo`
--

INSERT INTO `geo` (`id`, `lat`, `long`, `user_id`, `timestamp`) VALUES
(1, 50.0514, 8.56986, 5, '2016-04-06 07:21:54'),
(2, 50.0374, 8.58225, 5, '2016-04-06 07:25:49'),
(3, 50.0214, 8.54154, 5, '2016-04-06 07:26:45'),
(4, 50.0328, 8.55507, 5, '2016-04-06 13:26:45'),
(5, 50.0328, 8.55507, 5, '2016-04-07 13:26:45');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_vorname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_vorname`, `user_password_hash`, `user_email`) VALUES
(1, 'Balta', 'Gökhan', '$2y$10$4/j4DcCvEYVFAgxZKhk.G.auWTkFMSzSnj7a8/p14zOs2GrGwk6ve', 'goekhanbalta@live.de'),
(5, 'test', 'test', '$2y$10$YlpYy.mgOYS1z7kES4XAEuaSLXSla6zGc11uM.fAQQuZ6p0cVqw6y', 'test@test.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `workplace`
--

CREATE TABLE `workplace` (
  `id` int(11) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `workplace`
--

INSERT INTO `workplace` (`id`, `lat`, `long`) VALUES
(1, 50.0375, 8.4893),
(2, 50.0537, 8.55616),
(3, 50.0536, 8.60337),
(4, 50.0465, 8.602),
(5, 50.0197, 8.58972),
(6, 50.0225, 8.53144),
(7, 49.995, 8.53101),
(8, 49.995, 8.52011),
(9, 50.0375, 8.4893);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zeiterfassung`
--

CREATE TABLE `zeiterfassung` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `geo`
--
ALTER TABLE `geo`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indizes für die Tabelle `workplace`
--
ALTER TABLE `workplace`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `zeiterfassung`
--
ALTER TABLE `zeiterfassung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `geo`
--
ALTER TABLE `geo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `workplace`
--
ALTER TABLE `workplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `zeiterfassung`
--
ALTER TABLE `zeiterfassung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;