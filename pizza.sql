-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 02 okt 2017 kl 16:42
-- Serverversion: 5.7.11
-- PHP-version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `pizza`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `favorites`
--

CREATE TABLE `favorites` (
  `pizza` int(4) NOT NULL,
  `user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `ingredienser`
--

CREATE TABLE `ingredienser` (
  `namn` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `vegan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `ingredienser`
--

INSERT INTO `ingredienser` (`namn`, `category`, `vegan`) VALUES
('ananas', 'grönsak', 1),
('aubergine', 'grönsak', 1),
('bacon', 'kött', 0),
('banan', 'grönsak', 1),
('bearnaisesås', 'kött', 0),
('cayennepeppar', 'kött', 0),
('champinjoner', 'kött', 0),
('chili', 'kryda', 1),
('citronklyfta', 'övrigt', 1),
('crabfish', 'kött', 0),
('creme fraiche', 'kött', 0),
('curry', 'krydda', 1),
('fläskfilé', 'kött', 0),
('färsk paprika', 'grönsak', 1),
('färsk vitlök', 'grönsak', 1),
('färska champinjoner', 'grönsak', 1),
('färska tomater', 'grönsak', 1),
('gorgonzola', 'kött', 0),
('gräslök', 'grönsak', 1),
('grön sparris', 'grönsak', 1),
('halloumi', 'kött', 0),
('isbergsallad', 'grönsak', 1),
('isbergssallad', 'grönsak', 1),
('jalapeño', 'krydda', 1),
('jordnötter', 'grönsak', 1),
('kalamata oliver', 'grönsak', 1),
('kebabkött', 'kött', 0),
('kronärtskocka', 'grönsak', 1),
('kräftstjärtar', 'kött', 0),
('kyckling', 'kött', 0),
('köttfärssås', 'kött', 0),
('lök', 'grönsak', 1),
('mozzarella', 'kött', 0),
('musslor', 'kött', 0),
('oliver', 'grönsak', 1),
('Ost', 'ost', 0),
('oxfilé', 'kött', 0),
('paprika', 'grönsak', 1),
('parmesanost', 'kött', 0),
('pepperoni', 'krydda', 1),
('pepperonikorv', 'kött', 0),
('pesto', 'kött', 0),
('prosciutto', 'kött', 0),
('riddarost', 'kött', 0),
('ruccola', 'grönsak', 1),
('räkor', 'kött', 0),
('rödlök', 'grönsak', 1),
('salami', 'kött', 0),
('salladsost', 'kött', 0),
('Skinka', 'kött', 0),
('soltorkade tomater', 'grönsak', 1),
('sparris', 'grönsak', 1),
('strips', 'övrigt', 1),
('sås', 'kött', 0),
('tacosås', 'kött', 0),
('tomat', 'grönsak', 1),
('tonfisk', 'kött', 0),
('vitlök', 'krydda', 1),
('zucchini', 'grönsak', 1),
('ägg', 'kött', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `ingredienseronpizza`
--

CREATE TABLE `ingredienseronpizza` (
  `id` int(4) NOT NULL,
  `ingrediens` varchar(255) NOT NULL,
  `pizza` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `ingredienseronpizza`
--

INSERT INTO `ingredienseronpizza` (`id`, `ingrediens`, `pizza`) VALUES
(1, 'tomat', 1),
(2, 'Ost', 1),
(3, 'tomat', 2),
(4, 'ost', 2),
(5, 'skinka', 2),
(6, 'tomat', 3),
(7, 'ost', 3),
(8, 'skinka', 3),
(9, 'ananas', 3),
(10, 'tomat', 4),
(11, 'ost', 4),
(12, 'skinka', 4),
(13, 'räkor', 4),
(14, 'tomat', 5),
(15, 'ost', 5),
(16, 'skinka', 5),
(17, 'champinjoner', 5),
(18, 'tomat', 6),
(19, 'ost', 6),
(20, 'skinka', 6),
(21, 'tomat', 7),
(22, 'ost', 7),
(23, 'champinjoner', 7),
(24, 'räkor', 7),
(25, 'tomat', 8),
(26, 'ost', 8),
(27, 'skinka', 8),
(28, 'tonfisk', 8),
(29, 'tomat', 9),
(30, 'ost', 9),
(31, 'banan', 9),
(32, 'ananas', 9),
(33, 'tomat', 10),
(34, 'ost', 10),
(35, 'champinjoner', 10),
(36, 'lök', 10),
(37, 'paprika', 10),
(38, 'sparris', 10),
(39, 'kronärtskocka', 10),
(40, 'oliver', 10),
(41, 'tomat', 11),
(42, 'ost', 11),
(43, 'skinka', 11),
(44, 'fläskfilé', 11),
(45, 'champinjoner', 11),
(46, 'tomat', 12),
(47, 'ost', 12),
(48, 'skinka', 12),
(49, 'fläskfilé', 12),
(50, 'banan', 12),
(51, 'curry', 12),
(52, 'tomat', 13),
(53, 'ost', 13),
(54, 'champinjoner', 13),
(55, 'lök', 13),
(56, 'kyckling', 13),
(57, 'curry', 13),
(58, 'sås', 13),
(59, 'tomat', 14),
(60, 'ost', 14),
(61, 'skinka', 14),
(62, 'banan', 14),
(63, 'ananas', 14),
(64, 'jordnötter', 14),
(65, 'curry', 14),
(66, 'tomat', 15),
(67, 'ost', 15),
(68, 'skinka', 15),
(69, 'kebabkött', 15),
(70, 'sås', 15),
(71, 'tomat', 16),
(72, 'ost', 16),
(73, 'skinka', 16),
(74, 'räkor', 16),
(75, 'köttfärssås', 16),
(76, 'tomat', 17),
(77, 'ost', 17),
(78, 'skinka', 17),
(79, 'räkor', 17),
(80, 'tomat', 18),
(81, 'ost', 18),
(82, 'fläskfilé', 18),
(83, 'champinjoner', 18),
(84, 'lök', 18),
(85, 'vitlök', 18),
(86, 'tomat', 19),
(87, 'ost', 19),
(88, 'skinka', 19),
(89, 'champinjoner', 19),
(90, 'räkor', 19),
(91, 'musslor', 19),
(92, 'kronärtskocka', 19),
(93, 'tomat', 20),
(94, 'ost', 20),
(95, 'skinka', 20),
(96, 'ananas', 20),
(97, 'kebabkött', 20),
(98, 'lök', 20),
(99, 'sås', 20),
(100, 'tomat', 21),
(101, 'ost', 21),
(102, 'kebabkött', 21),
(103, 'pepperoni', 21),
(104, 'sås', 21),
(105, 'tomat', 22),
(106, 'ost', 22),
(107, 'fläskfilé', 22),
(108, 'sparris', 22),
(109, 'bearnaisesås', 22),
(110, 'tomat', 23),
(111, 'ost', 23),
(112, 'kebabkött', 23),
(113, 'fläskfilé', 23),
(114, 'bearnaisesås', 23),
(115, 'sås', 23),
(116, 'tomat', 24),
(117, 'ost', 24),
(118, 'fläskfilé', 24),
(119, 'färska champinjoner', 24),
(120, 'gorgonzola', 24),
(121, 'tomat', 25),
(122, 'ost', 25),
(123, 'färska champinjoner', 25),
(124, 'färska tomater', 25),
(125, 'köttfärssås', 25),
(126, 'jalapeño', 25),
(127, 'tacosås', 25),
(128, 'tomat', 26),
(129, 'ost', 26),
(130, 'skinka', 26),
(131, 'räkor', 26),
(132, 'kebabkött', 26),
(133, 'fläskfilé', 26),
(134, 'sås', 26),
(135, 'tomat', 27),
(136, 'ost', 27),
(137, 'skinka', 27),
(138, 'champinjoner', 27),
(139, 'räkor', 27),
(140, 'ananas', 27),
(141, 'kebabkött', 27),
(142, 'sås', 27),
(143, 'tomat', 28),
(144, 'ost', 28),
(145, 'skinka', 28),
(146, 'champinjoner', 28),
(147, 'fläskfilé', 28),
(148, 'kebabkött', 28),
(149, 'bearnaisesås', 28),
(150, 'tomat', 29),
(151, 'ost', 29),
(152, 'skinka', 29),
(153, 'kebabkött', 29),
(154, 'fläskfilé', 29),
(155, 'sås', 29),
(156, 'tomat', 30),
(157, 'ost', 30),
(158, 'skinka', 30),
(159, 'strips', 30),
(160, 'sås', 30),
(161, 'tomat', 31),
(162, 'ost', 31),
(163, 'kebabkött', 31),
(164, 'sås', 31),
(165, 'isbergssallad', 31),
(166, 'pepperoni', 31),
(167, 'tomat', 32),
(168, 'ost', 32),
(169, 'mozzarella', 32),
(170, 'salladsost', 32),
(171, 'gorgonzola', 32),
(172, 'riddarost', 32),
(173, 'tomat', 33),
(174, 'ost', 33),
(175, 'färska champinjoner', 33),
(176, 'färska tomater', 33),
(177, 'lök', 33),
(178, 'chili', 33),
(179, 'kebabkött', 33),
(180, 'vitlök', 33),
(181, 'sås', 33),
(182, 'tomat', 34),
(183, 'ost', 34),
(184, 'mozzarella', 34),
(185, 'salladsost', 34),
(186, 'parmesanost', 34),
(187, 'oliver', 34),
(188, 'färsk vitlök', 34),
(189, 'ruccola', 34),
(190, 'tomat', 35),
(191, 'ost', 35),
(192, 'oxfilé', 35),
(193, 'färska champinjoner', 35),
(194, 'lök', 35),
(195, 'jalapeño', 35),
(196, 'tacosås', 35),
(197, 'vitlök', 35),
(198, 'tomat', 36),
(199, 'ost', 36),
(200, 'oxfilé', 36),
(201, 'fläskfilé', 36),
(202, 'färska champinjoner', 36),
(203, 'färska tomater', 36),
(204, 'bearnaisesås', 36),
(205, 'vitlök', 36),
(206, 'tomat', 37),
(207, 'ost', 37),
(208, 'oxfilé', 37),
(209, 'gorgonzola', 37),
(210, 'färska champinjoner', 37),
(211, 'lök', 37),
(212, 'tomat', 38),
(213, 'ost', 38),
(214, 'skinka', 38),
(215, 'champinjoner', 38),
(216, 'ägg', 38),
(217, 'lök', 38),
(218, 'bacon', 38),
(219, 'tomat', 39),
(220, 'ost', 39),
(221, 'oxfilé', 39),
(222, 'mozzarella', 39),
(223, 'soltorkade tomater', 39),
(224, 'ruccola', 39),
(225, 'tomat', 40),
(226, 'ost', 40),
(227, 'mozzarella', 40),
(228, 'prosciutto', 40),
(229, 'soltorkade tomater', 40),
(230, 'vitlök', 40),
(231, 'ruccola', 40),
(232, 'tomat', 41),
(233, 'ost', 41),
(234, 'mozzarella', 41),
(235, 'salami', 41),
(236, 'soltorkade tomater', 41),
(237, 'vitlök', 41),
(238, 'ruccola', 41),
(239, 'tomat', 42),
(240, 'ost', 42),
(241, 'mozzarella', 42),
(242, 'oxfilé', 42),
(243, 'färska tomater', 42),
(244, 'räkor', 42),
(245, 'vitlök', 42),
(246, 'bearnaisesås', 42),
(247, 'tomat', 43),
(248, 'ost', 43),
(249, 'rödlök', 43),
(250, 'salladsost', 43),
(251, 'oliver', 43),
(252, 'soltorkade tomater', 42),
(253, 'ruccola', 43),
(254, 'tomat', 44),
(255, 'ost', 44),
(256, 'mozzarella', 44),
(257, 'halloumi', 44),
(258, 'grön sparris', 44),
(259, 'kalamata oliver', 44),
(260, 'gräslök', 44),
(261, 'färsk vitlök', 44),
(262, 'tomat', 46),
(263, 'ost', 46),
(264, 'mozzarella', 46),
(265, 'pepperonikorv', 46),
(266, 'färska champinjoner', 46),
(267, 'ruccola', 46),
(268, 'tomat', 45),
(269, 'ost', 45),
(270, 'aubergine', 45),
(271, 'zucchini', 45),
(272, 'färska champinjoner', 45),
(273, 'färsk paprika', 45),
(274, 'kalamata oliver', 45),
(275, 'färsk vitlök', 45),
(276, 'tomat', 47),
(277, 'ost', 47),
(278, 'kebabkött', 47),
(279, 'isbergsallad', 47),
(280, 'strips', 47),
(281, 'sås', 47),
(282, 'tomat', 48),
(283, 'ost', 48),
(284, 'crème fraiche', 48),
(285, 'räkor', 48),
(286, 'kräftstjärtar', 48),
(287, 'crabfish', 48),
(288, 'gräslök', 48),
(289, 'citronklyfta', 48),
(290, 'tomat', 49),
(291, 'ost', 49),
(292, 'crème fraiche', 49),
(293, 'mozzarella', 49),
(294, 'bacon', 49),
(295, 'rödlök', 49),
(296, 'cayennepeppar', 49),
(297, 'ruccola', 49),
(298, 'champinjoner', 17);

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pizza` int(4) NOT NULL,
  `user` int(4) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `pizzerior`
--

CREATE TABLE `pizzerior` (
  `id` int(4) NOT NULL,
  `namn` varchar(255) NOT NULL,
  `hasGlutenFree` tinyint(1) NOT NULL,
  `lng` float NOT NULL,
  `lat` float NOT NULL,
  `openinghouers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `pizzerior`
--

INSERT INTO `pizzerior` (`id`, `namn`, `hasGlutenFree`, `lng`, `lat`, `openinghouers`) VALUES
(1, 'Biblos', 1, 57.793, 14.2759, '{mon:11-22, tis::11-22, ons:11-22, tor:11-22, fre:11-22, lör:11-22, sön:11-22}');

-- --------------------------------------------------------

--
-- Tabellstruktur `pizzorinpizzeria`
--

CREATE TABLE `pizzorinpizzeria` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pizzeria` int(4) NOT NULL,
  `pizzanr` int(4) NOT NULL,
  `pris` int(4) NOT NULL,
  `Stars` int(5) NOT NULL,
  `orders` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `pizzorinpizzeria`
--

INSERT INTO `pizzorinpizzeria` (`id`, `name`, `pizzeria`, `pizzanr`, `pris`, `Stars`, `orders`) VALUES
(1, 'Margherita', 1, 1, 80, 0, 0),
(2, 'Vesuvio', 1, 2, 85, 0, 0),
(3, 'Hawaii', 1, 3, 85, 0, 0),
(4, 'Capri', 1, 4, 85, 0, 0),
(5, 'Capricciosa', 1, 5, 85, 0, 0),
(6, 'Calzone', 1, 6, 85, 0, 0),
(7, 'Blecko', 1, 7, 85, 0, 0),
(8, 'La Tuna', 1, 8, 85, 0, 0),
(9, 'Afrikana', 1, 9, 85, 0, 0),
(10, 'Vegetariana', 1, 10, 90, 0, 0),
(11, 'HV-71', 1, 11, 90, 0, 0),
(12, 'Tropicana', 1, 12, 90, 0, 0),
(13, 'Kyckling Pizza', 1, 13, 90, 0, 0),
(14, 'Chiquita', 1, 14, 90, 0, 0),
(15, 'Batman', 1, 15, 90, 0, 0),
(16, 'Disco', 1, 16, 90, 0, 0),
(17, 'Jamaica', 1, 17, 90, 0, 0),
(18, 'Ciao Ciao', 1, 18, 90, 0, 0),
(19, 'Quattro Stagioni', 1, 19, 90, 0, 0),
(20, 'Venezia', 1, 20, 90, 0, 0),
(21, 'Kebab Pizza', 1, 21, 90, 0, 0),
(22, 'Gourmet', 1, 22, 90, 0, 0),
(23, 'Poker', 1, 23, 90, 0, 0),
(24, 'Gorgonzola', 1, 24, 90, 0, 0),
(25, 'Mexicana', 1, 25, 100, 0, 0),
(26, 'Martin Special', 1, 26, 100, 0, 0),
(27, 'Himalaya', 1, 27, 100, 0, 0),
(28, 'Kärlek', 1, 28, 100, 0, 0),
(29, 'Sussi', 1, 29, 100, 0, 0),
(30, 'Stella', 1, 30, 100, 0, 0),
(31, 'Caroline', 1, 31, 100, 0, 0),
(32, 'Quattro Formaggi', 1, 32, 100, 0, 0),
(33, 'Chili', 1, 33, 100, 0, 0),
(34, 'Biblos Special', 1, 34, 110, 0, 0),
(35, 'Acapulco', 1, 35, 110, 0, 0),
(36, 'Paris', 1, 37, 110, 0, 0),
(37, 'New York', 1, 38, 110, 0, 0),
(38, 'Daniel', 1, 39, 110, 0, 0),
(39, 'Inter', 1, 40, 110, 0, 0),
(40, 'Napoli', 1, 41, 110, 0, 0),
(41, 'Chania', 1, 42, 110, 0, 0),
(42, 'Michael', 1, 43, 110, 0, 0),
(43, 'Halloumi Pizza', 1, 44, 110, 0, 0),
(44, 'Pepperoni Pizza', 1, 46, 110, 0, 0),
(45, 'Ortolana', 1, 45, 110, 0, 0),
(46, 'Tre Kronor', 1, 47, 110, 0, 0),
(47, 'Havets Läckerheter', 1, 48, 110, 0, 0),
(48, 'Bianco', 1, 49, 110, 0, 0),
(49, 'Calabria', 1, 50, 110, 0, 0),
(50, 'Dubbel Ciao Ciao', 1, 51, 110, 0, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `favorites_fk0` (`pizza`),
  ADD KEY `favorites_fk1` (`user`);

--
-- Index för tabell `ingredienser`
--
ALTER TABLE `ingredienser`
  ADD PRIMARY KEY (`namn`),
  ADD UNIQUE KEY `namn` (`namn`);

--
-- Index för tabell `ingredienseronpizza`
--
ALTER TABLE `ingredienseronpizza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredienserOnPizza_fk0` (`ingrediens`),
  ADD KEY `ingredienserOnPizza_fk1` (`pizza`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk0` (`pizza`),
  ADD KEY `orders_fk1` (`user`);

--
-- Index för tabell `pizzerior`
--
ALTER TABLE `pizzerior`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `namn` (`namn`);

--
-- Index för tabell `pizzorinpizzeria`
--
ALTER TABLE `pizzorinpizzeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizzorInPizzeria_fk0` (`pizzeria`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `ingredienseronpizza`
--
ALTER TABLE `ingredienseronpizza`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;
--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `pizzerior`
--
ALTER TABLE `pizzerior`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `pizzorinpizzeria`
--
ALTER TABLE `pizzorinpizzeria`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_fk0` FOREIGN KEY (`pizza`) REFERENCES `pizzorinpizzeria` (`id`),
  ADD CONSTRAINT `favorites_fk1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Restriktioner för tabell `ingredienseronpizza`
--
ALTER TABLE `ingredienseronpizza`
  ADD CONSTRAINT `ingredienserOnPizza_fk0` FOREIGN KEY (`ingrediens`) REFERENCES `ingredienser` (`namn`),
  ADD CONSTRAINT `ingredienserOnPizza_fk1` FOREIGN KEY (`pizza`) REFERENCES `pizzorinpizzeria` (`id`);

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`pizza`) REFERENCES `pizzorinpizzeria` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Restriktioner för tabell `pizzorinpizzeria`
--
ALTER TABLE `pizzorinpizzeria`
  ADD CONSTRAINT `pizzorInPizzeria_fk0` FOREIGN KEY (`pizzeria`) REFERENCES `pizzerior` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
