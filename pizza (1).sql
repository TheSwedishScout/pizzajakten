-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 10 nov 2017 kl 12:39
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
-- Tabellstruktur `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `town` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `cities`
--

INSERT INTO `cities` (`id`, `town`) VALUES
(1, 'Jönköping');

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
('ananas', 'grönsaker', 1),
('aubergine', 'grönsaker', 1),
('bacon', 'kött', 0),
('banan', 'grönsaker', 1),
('bearnaisesås', 'sås', 0),
('cayennepeppar', 'Kryddor', 0),
('champinjoner', 'grönsaker', 0),
('chili', 'Kryddor', 1),
('citronklyfta', 'övrigt', 1),
('crabfish', 'kött', 0),
('creme fraiche', 'sås', 0),
('curry', 'Kryddor', 1),
('fläskfilé', 'kött', 0),
('färsk paprika', 'grönsaker', 1),
('färsk vitlök', 'grönsaker', 1),
('färska champinjoner', 'grönsaker', 1),
('färska tomater', 'grönsaker', 1),
('gorgonzola', 'ost', 0),
('gräslök', 'grönsaker', 1),
('grön sparris', 'grönsaker', 1),
('halloumi', 'ost', 0),
('isbergssallad', 'grönsaker', 1),
('jalapeño', 'Kryddor', 1),
('jordnötter', 'grönsaker', 1),
('kalamata oliver', 'grönsaker', 1),
('kebabkött', 'kött', 0),
('kebabsås', 'sås', 0),
('kronärtskocka', 'grönsaker', 1),
('kräftstjärtar', 'kött', 0),
('kyckling', 'kött', 0),
('köttfärssås', 'kött', 0),
('lök', 'grönsaker', 1),
('majs', 'grönsaker', 0),
('mozzarella', 'ost', 0),
('musslor', 'kött', 0),
('oliver', 'grönsaker', 1),
('ost', 'ost', 0),
('oxfilé', 'kött', 0),
('paprika', 'grönsaker', 1),
('parmesanost', 'ost', 0),
('pepperoni', 'Kryddor', 1),
('pepperonikorv', 'kött', 0),
('pesto', 'Kryddor', 0),
('prosciutto', 'kött', 0),
('riddarost', 'ost', 0),
('ruccola', 'grönsaker', 1),
('räkor', 'kött', 0),
('rödlök', 'grönsaker', 1),
('salami', 'kött', 0),
('salladsost', 'ost', 0),
('skinka', 'kött', 0),
('soltorkade tomater', 'grönsaker', 1),
('sparris', 'grönsaker', 1),
('strips', 'övrigt', 1),
('sås', 'sås', 0),
('tacosås', 'sås', 0),
('tomatsås', 'sås', 1),
('tonfisk', 'kött', 0),
('vitlök', 'Kryddor', 1),
('zucchini', 'grönsaker', 1),
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
(3, 'tomatsås', 2),
(4, 'ost', 2),
(5, 'skinka', 2),
(6, 'tomatsås', 3),
(7, 'ost', 3),
(8, 'skinka', 3),
(9, 'ananas', 3),
(10, 'tomatsås', 4),
(11, 'ost', 4),
(12, 'skinka', 4),
(13, 'räkor', 4),
(14, 'tomatsås', 5),
(15, 'ost', 5),
(16, 'skinka', 5),
(17, 'champinjoner', 5),
(18, 'tomatsås', 6),
(19, 'ost', 6),
(20, 'skinka', 6),
(21, 'tomatsås', 7),
(22, 'ost', 7),
(23, 'champinjoner', 7),
(24, 'räkor', 7),
(25, 'tomatsås', 8),
(26, 'ost', 8),
(27, 'skinka', 8),
(28, 'tonfisk', 8),
(29, 'tomatsås', 9),
(30, 'ost', 9),
(31, 'banan', 9),
(32, 'ananas', 9),
(33, 'tomatsås', 10),
(34, 'ost', 10),
(35, 'champinjoner', 10),
(36, 'lök', 10),
(37, 'paprika', 10),
(38, 'sparris', 10),
(39, 'kronärtskocka', 10),
(40, 'oliver', 10),
(41, 'tomatsås', 11),
(42, 'ost', 11),
(43, 'skinka', 11),
(44, 'fläskfilé', 11),
(45, 'champinjoner', 11),
(46, 'tomatsås', 12),
(47, 'ost', 12),
(48, 'skinka', 12),
(49, 'fläskfilé', 12),
(50, 'banan', 12),
(51, 'curry', 12),
(52, 'tomatsås', 13),
(53, 'ost', 13),
(54, 'champinjoner', 13),
(55, 'lök', 13),
(56, 'kyckling', 13),
(57, 'curry', 13),
(58, 'sås', 13),
(59, 'tomatsås', 14),
(60, 'ost', 14),
(61, 'skinka', 14),
(62, 'banan', 14),
(63, 'ananas', 14),
(64, 'jordnötter', 14),
(65, 'curry', 14),
(66, 'tomatsås', 15),
(67, 'ost', 15),
(68, 'skinka', 15),
(69, 'kebabkött', 15),
(70, 'sås', 15),
(71, 'tomatsås', 16),
(72, 'ost', 16),
(73, 'skinka', 16),
(74, 'räkor', 16),
(75, 'köttfärssås', 16),
(76, 'tomatsås', 17),
(77, 'ost', 17),
(78, 'skinka', 17),
(79, 'räkor', 17),
(80, 'tomatsås', 18),
(81, 'ost', 18),
(82, 'fläskfilé', 18),
(83, 'champinjoner', 18),
(84, 'lök', 18),
(85, 'vitlök', 18),
(86, 'tomatsås', 19),
(87, 'ost', 19),
(88, 'skinka', 19),
(89, 'champinjoner', 19),
(90, 'räkor', 19),
(91, 'musslor', 19),
(92, 'kronärtskocka', 19),
(93, 'tomatsås', 20),
(94, 'ost', 20),
(95, 'skinka', 20),
(96, 'ananas', 20),
(97, 'kebabkött', 20),
(98, 'lök', 20),
(99, 'sås', 20),
(100, 'tomatsås', 21),
(101, 'ost', 21),
(102, 'kebabkött', 21),
(103, 'pepperoni', 21),
(104, 'sås', 21),
(105, 'tomatsås', 22),
(106, 'ost', 22),
(107, 'fläskfilé', 22),
(108, 'sparris', 22),
(109, 'bearnaisesås', 22),
(110, 'tomatsås', 23),
(111, 'ost', 23),
(112, 'kebabkött', 23),
(113, 'fläskfilé', 23),
(114, 'bearnaisesås', 23),
(115, 'sås', 23),
(116, 'tomatsås', 24),
(117, 'ost', 24),
(118, 'fläskfilé', 24),
(119, 'färska champinjoner', 24),
(120, 'gorgonzola', 24),
(121, 'tomatsås', 25),
(122, 'ost', 25),
(123, 'färska champinjoner', 25),
(124, 'färska tomater', 25),
(125, 'köttfärssås', 25),
(126, 'jalapeño', 25),
(127, 'tacosås', 25),
(128, 'tomatsås', 26),
(129, 'ost', 26),
(130, 'skinka', 26),
(131, 'räkor', 26),
(132, 'kebabkött', 26),
(133, 'fläskfilé', 26),
(134, 'sås', 26),
(135, 'tomatsås', 27),
(136, 'ost', 27),
(137, 'skinka', 27),
(138, 'champinjoner', 27),
(139, 'räkor', 27),
(140, 'ananas', 27),
(141, 'kebabkött', 27),
(142, 'sås', 27),
(143, 'tomatsås', 28),
(144, 'ost', 28),
(145, 'skinka', 28),
(146, 'champinjoner', 28),
(147, 'fläskfilé', 28),
(148, 'kebabkött', 28),
(149, 'bearnaisesås', 28),
(150, 'tomatsås', 29),
(151, 'ost', 29),
(152, 'skinka', 29),
(153, 'kebabkött', 29),
(154, 'fläskfilé', 29),
(155, 'sås', 29),
(156, 'tomatsås', 30),
(157, 'ost', 30),
(158, 'skinka', 30),
(159, 'strips', 30),
(160, 'sås', 30),
(161, 'tomatsås', 31),
(162, 'ost', 31),
(163, 'kebabkött', 31),
(164, 'sås', 31),
(165, 'isbergssallad', 31),
(166, 'pepperoni', 31),
(167, 'tomatsås', 32),
(168, 'ost', 32),
(169, 'mozzarella', 32),
(170, 'salladsost', 32),
(171, 'gorgonzola', 32),
(172, 'riddarost', 32),
(173, 'tomatsås', 33),
(174, 'ost', 33),
(175, 'färska champinjoner', 33),
(176, 'färska tomater', 33),
(177, 'lök', 33),
(178, 'chili', 33),
(179, 'kebabkött', 33),
(180, 'vitlök', 33),
(181, 'sås', 33),
(182, 'tomatsås', 34),
(183, 'ost', 34),
(184, 'mozzarella', 34),
(185, 'salladsost', 34),
(186, 'parmesanost', 34),
(187, 'oliver', 34),
(188, 'färsk vitlök', 34),
(189, 'ruccola', 34),
(190, 'tomatsås', 35),
(191, 'ost', 35),
(192, 'oxfilé', 35),
(193, 'färska champinjoner', 35),
(194, 'lök', 35),
(195, 'jalapeño', 35),
(196, 'tacosås', 35),
(197, 'vitlök', 35),
(198, 'tomatsås', 36),
(199, 'ost', 36),
(200, 'oxfilé', 36),
(201, 'fläskfilé', 36),
(202, 'färska champinjoner', 36),
(203, 'färska tomater', 36),
(204, 'bearnaisesås', 36),
(205, 'vitlök', 36),
(206, 'tomatsås', 37),
(207, 'ost', 37),
(208, 'oxfilé', 37),
(209, 'gorgonzola', 37),
(210, 'färska champinjoner', 37),
(211, 'lök', 37),
(212, 'tomatsås', 38),
(213, 'ost', 38),
(214, 'skinka', 38),
(215, 'champinjoner', 38),
(216, 'ägg', 38),
(217, 'lök', 38),
(218, 'bacon', 38),
(219, 'tomatsås', 39),
(220, 'ost', 39),
(221, 'oxfilé', 39),
(222, 'mozzarella', 39),
(223, 'soltorkade tomater', 39),
(224, 'ruccola', 39),
(225, 'tomatsås', 40),
(226, 'ost', 40),
(227, 'mozzarella', 40),
(228, 'prosciutto', 40),
(229, 'soltorkade tomater', 40),
(230, 'vitlök', 40),
(231, 'ruccola', 40),
(232, 'tomatsås', 41),
(233, 'ost', 41),
(234, 'mozzarella', 41),
(235, 'salami', 41),
(236, 'soltorkade tomater', 41),
(237, 'vitlök', 41),
(238, 'ruccola', 41),
(239, 'tomatsås', 42),
(240, 'ost', 42),
(241, 'mozzarella', 42),
(242, 'oxfilé', 42),
(243, 'färska tomater', 42),
(244, 'räkor', 42),
(245, 'vitlök', 42),
(246, 'bearnaisesås', 42),
(247, 'tomatsås', 43),
(248, 'ost', 43),
(249, 'rödlök', 43),
(250, 'salladsost', 43),
(251, 'oliver', 43),
(252, 'soltorkade tomater', 42),
(253, 'ruccola', 43),
(254, 'tomatsås', 44),
(255, 'ost', 44),
(256, 'mozzarella', 44),
(257, 'halloumi', 44),
(258, 'grön sparris', 44),
(259, 'kalamata oliver', 44),
(260, 'gräslök', 44),
(261, 'färsk vitlök', 44),
(262, 'tomatsås', 46),
(263, 'ost', 46),
(264, 'mozzarella', 46),
(265, 'pepperonikorv', 46),
(266, 'färska champinjoner', 46),
(267, 'ruccola', 46),
(268, 'tomatsås', 45),
(269, 'ost', 45),
(270, 'aubergine', 45),
(271, 'zucchini', 45),
(272, 'färska champinjoner', 45),
(273, 'färsk paprika', 45),
(274, 'kalamata oliver', 45),
(275, 'färsk vitlök', 45),
(276, 'tomatsås', 47),
(277, 'ost', 47),
(278, 'kebabkött', 47),
(279, 'isbergssallad', 47),
(280, 'strips', 47),
(281, 'sås', 47),
(282, 'tomatsås', 48),
(283, 'ost', 48),
(284, 'crème fraiche', 48),
(285, 'räkor', 48),
(286, 'kräftstjärtar', 48),
(287, 'crabfish', 48),
(288, 'gräslök', 48),
(289, 'citronklyfta', 48),
(290, 'tomatsås', 49),
(291, 'ost', 49),
(292, 'crème fraiche', 49),
(293, 'mozzarella', 49),
(294, 'bacon', 49),
(295, 'rödlök', 49),
(296, 'cayennepeppar', 49),
(297, 'ruccola', 49),
(298, 'champinjoner', 17),
(299, 'tomatsås', 59),
(300, 'ost', 59),
(305, 'tonfisk', 61),
(306, 'skinka', 61),
(307, 'tomatsås', 61),
(308, 'ost', 61),
(321, 'ost', 67),
(322, 'tomatsås', 67),
(328, 'ost', 71),
(329, 'tomatsås', 71),
(330, 'champinjoner', 71),
(331, 'ost', 72),
(332, 'tomatsås', 72),
(333, 'salami', 72),
(334, 'ost', 73),
(335, 'tomatsås', 73),
(336, 'tonfisk', 73),
(337, 'ost', 74),
(338, 'tomatsås', 74),
(339, 'köttfärssås', 74),
(340, 'ost', 75),
(341, 'tomatsås', 75),
(342, 'skinka', 75),
(343, 'ost', 76),
(344, 'tomatsås', 76),
(345, 'skinka', 76),
(346, 'ost', 77),
(347, 'tomatsås', 77),
(348, 'skinka', 77),
(349, 'champinjoner', 77),
(350, 'ost', 78),
(351, 'tomatsås', 78),
(352, 'skinka', 78),
(353, 'räkor', 78),
(354, 'ost', 79),
(355, 'tomatsås', 79),
(356, 'skinka', 79),
(357, 'ananas', 79),
(358, 'ost', 80),
(359, 'tomatsås', 80),
(360, 'räkor', 80),
(361, 'musslor', 80),
(362, 'ost', 81),
(363, 'tomatsås', 81),
(364, 'skinka', 81),
(365, 'tonfisk', 81),
(366, 'ost', 82),
(367, 'tomatsås', 82),
(368, 'skinka', 82),
(369, 'banan', 82),
(370, 'ananas', 82),
(371, 'ost', 83),
(372, 'tomatsås', 83),
(373, 'färsk paprika', 83),
(374, 'ananas', 83),
(375, 'ost', 84),
(376, 'tomatsås', 84),
(377, 'skinka', 84),
(378, 'bacon', 84),
(379, 'ost', 85),
(380, 'tomatsås', 85),
(381, 'skinka', 85),
(382, 'räkor', 85),
(383, 'ananas', 85),
(384, 'ost', 86),
(385, 'tomatsås', 86),
(386, 'köttfärssås', 86),
(387, 'champinjoner', 86),
(388, 'ost', 87),
(389, 'tomatsås', 87),
(390, 'skinka', 87),
(391, 'räkor', 87),
(392, 'champinjoner', 87),
(393, 'ost', 88),
(394, 'tomatsås', 88),
(395, 'skinka', 88),
(396, 'köttfärssås', 88),
(397, 'räkor', 88),
(398, 'ost', 89),
(399, 'tomatsås', 89),
(400, 'skinka', 89),
(401, 'champinjoner', 89),
(402, 'räkor', 89),
(403, 'musslor', 89),
(404, 'ost', 90),
(405, 'tomatsås', 90),
(406, 'skinka', 90),
(407, 'champinjoner', 90),
(408, 'fläskfilé', 90),
(409, 'ost', 91),
(410, 'tomatsås', 91),
(411, 'kyckling', 91),
(412, 'champinjoner', 91),
(413, 'banan', 91),
(414, 'curry', 91),
(415, 'ost', 92),
(416, 'tomatsås', 92),
(417, 'ägg', 92),
(418, 'bacon', 92),
(419, 'färska tomater', 92),
(420, 'ost', 93),
(421, 'tomatsås', 93),
(422, 'fläskfilé', 93),
(423, 'champinjoner', 93),
(424, 'färsk vitlök', 93),
(425, 'ost', 94),
(426, 'tomatsås', 94),
(427, 'skinka', 94),
(428, 'bacon', 94),
(429, 'köttfärssås', 94),
(430, 'ost', 95),
(431, 'tomatsås', 95),
(432, 'crabfish', 95),
(433, 'champinjoner', 95),
(434, 'ost', 96),
(435, 'tomatsås', 96),
(436, 'kebabkött', 96),
(437, 'champinjoner', 96),
(438, 'ost', 97),
(439, 'tomatsås', 97),
(440, 'kebabkött', 97),
(441, 'kebabsås', 97),
(442, 'pepperoni', 97),
(443, 'ost', 98),
(444, 'tomatsås', 98),
(445, 'fläskfilé', 98),
(446, 'bearnaisesås', 98),
(447, 'ananas', 98),
(448, 'ost', 99),
(449, 'tomatsås', 99),
(450, 'fläskfilé', 99),
(451, 'champinjoner', 99),
(452, 'kebabsås', 99),
(453, 'ost', 100),
(454, 'tomatsås', 100),
(455, 'bacon', 100),
(456, 'färsk paprika', 100),
(457, 'köttfärssås', 100),
(458, 'ost', 101),
(459, 'tomatsås', 101),
(460, 'kebabkött', 101),
(461, 'bearnaisesås', 101),
(462, 'ost', 102),
(463, 'tomatsås', 102),
(464, 'fläskfilé', 102),
(465, 'grön sparris', 102),
(466, 'räkor', 102),
(467, 'bearnaisesås', 102),
(468, 'ost', 103),
(469, 'tomatsås', 103),
(470, 'bacon', 103),
(471, 'kebabkött', 103),
(472, 'kebabsås', 103),
(473, 'ost', 104),
(474, 'tomatsås', 104),
(475, 'kebabkött', 104),
(476, 'champinjoner', 104),
(477, 'kebabsås', 104),
(478, 'färska tomater', 104),
(479, 'ost', 105),
(480, 'tomatsås', 105),
(481, 'kebabkött', 105),
(482, 'kebabsås', 105),
(483, 'isbergssallad', 105),
(484, 'pepperoni', 105),
(485, 'ost', 106),
(486, 'tomatsås', 106),
(487, 'skinka', 106),
(488, 'fläskfilé', 106),
(489, 'räkor', 106),
(490, 'färsk paprika', 106),
(491, 'ost', 107),
(492, 'tomatsås', 107),
(493, 'skinka', 107),
(494, 'fläskfilé', 107),
(495, 'champinjoner', 107),
(496, 'bearnaisesås', 107),
(497, 'ost', 108),
(498, 'tomatsås', 108),
(499, 'skinka', 108),
(500, 'kebabkött', 108),
(501, 'kebabsås', 108),
(502, 'ananas', 108),
(503, 'ananas', 108),
(504, 'ost', 109),
(505, 'tomatsås', 109),
(506, 'skinka', 109),
(507, 'räkor', 109),
(508, 'champinjoner', 109),
(509, 'musslor', 109),
(510, 'färsk paprika', 109),
(511, 'grön sparris', 109),
(512, 'ost', 110),
(513, 'tomatsås', 110),
(514, 'kebabkött', 110),
(515, 'champinjoner', 110),
(516, 'färska tomater', 110),
(517, 'isbergssallad', 110),
(518, 'strips', 110),
(519, 'kebabsås', 110),
(550, 'ost', 1),
(551, 'tomatsås', 1),
(552, 'tomatsås', 111),
(553, 'ost', 111),
(554, 'färska champinjoner', 111),
(559, 'skinka', 113),
(560, 'champinjoner', 113),
(561, 'tomatsås', 113),
(562, 'ost', 113),
(563, 'skinka', 62),
(564, 'tomatsås', 62),
(565, 'ost', 62),
(566, 'ananas', 62),
(567, 'skinka', 114),
(568, 'räkor', 114),
(569, 'tomatsås', 114),
(570, 'ost', 114),
(584, 'tomatsås', 115),
(585, 'ost', 115),
(586, 'banan', 115),
(587, 'curry', 115),
(588, 'ananas', 115),
(589, 'skinka', 115);

-- --------------------------------------------------------

--
-- Tabellstruktur `kategorier`
--

CREATE TABLE `kategorier` (
  `namn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `kategorier`
--

INSERT INTO `kategorier` (`namn`) VALUES
('grönsaker'),
('Kryddor'),
('kött'),
('ost'),
('sås'),
('övrigt');

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `pizza` int(11) NOT NULL,
  `time_orderd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`id`, `user`, `pizza`, `time_orderd`) VALUES
(2, 2, 1, '2017-11-08 12:15:07'),
(10, 6, 108, '2017-11-08 13:27:40'),
(11, 6, 39, '2017-11-08 13:30:18'),
(12, 6, 40, '2017-11-08 13:30:18'),
(13, 7, 93, '2017-11-08 15:22:11'),
(14, 2, 105, '2017-11-09 14:01:06'),
(15, 2, 1, '2017-11-09 14:01:07'),
(16, 2, 83, '2017-11-09 14:01:07'),
(17, 6, 9, '2017-11-10 10:17:34');

-- --------------------------------------------------------

--
-- Tabellstruktur `pizzerior`
--

CREATE TABLE `pizzerior` (
  `id` int(4) NOT NULL,
  `namn` varchar(255) NOT NULL,
  `hasGlutenFree` tinyint(1) NOT NULL,
  `lng` float DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `openinghouers` varchar(255) NOT NULL,
  `town` int(11) NOT NULL DEFAULT '1',
  `adress` varchar(50) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `pizzerior`
--

INSERT INTO `pizzerior` (`id`, `namn`, `hasGlutenFree`, `lng`, `lat`, `openinghouers`, `town`, `adress`, `url`) VALUES
(1, 'Biblos', 1, 14.2759, 57.793, '{\'mon\':\'11:00 - 22:00\', \'tis\':\'11:00 - 22:00\', \'ons\':\'11:00 - 22:00\', \'tor\':\'11:00 - 22:00\', \'fre\':\'11:00 - 22:00\', \'lör\':\'11:00 - 22:00\', \'sön\':\'11:00 - 22:00\'}', 1, 'Drottninggatan 18, 561 31 Huskvarna', 'http://biblos.se/'),
(2, 'Cucchini ', 0, 14.1586, 57.7802, '{\'mon\':\'11:00 - 22:00\', \'tis\':\'11:00 - 22:00\', \'ons\':\'11:00 - 22:00\', \'tor\':\'11:00 - 22:00\', \'fre\':\'11:00 - 23:00\', \'lor\':\'11:00 - 23:00\', \'son\':\'12:00 - 22:00\'}', 1, '\r\nBirkagatan 8, 554 65 Jönköping', 'http://www.pizzeriacucchini.se/'),
(3, 'Pizzeria 12an', 0, 0, 0, '{\'mon\':\'11:00 - 21:00\', \'tis\':\'11:00 - 21:00\', \'ons\':\'11:00 - 21:00\', \'tor\':\'11:00 - 21:00\', \'fre\':\'11:00 - 22:00\', \'lor\':\'11:00 - 22:00\', \'son\':\'12:00 - 21:00\'}', 1, 'Brunnsgatan 12, 553 17 Jönköping', 'http://www.pizzeria12an.se/'),
(5, 'Pizzeria Campino', 0, NULL, NULL, '{\'mon\':\'11:00 - 22:00\', \'tis\':\'11:00 - 22:00\', \'ons\':\'11:00 - 22:00\', \'tor\':\'11:00 - 22:00\', \'fre\':\'11:00 - 23:00\', \'lor\':\'11:00 - 12:00\', \'son\':\'12:00 - 22:00\'}', 1, 'Fabriksgatan 16, 553 18 Jönköping', 'http://www.pizzeriacampino.nu/');

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
  `favorits` int(5) NOT NULL,
  `orders` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `pizzorinpizzeria`
--

INSERT INTO `pizzorinpizzeria` (`id`, `name`, `pizzeria`, `pizzanr`, `pris`, `favorits`, `orders`) VALUES
(1, 'margahreta', 1, 1, 80, 0, 0),
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
(50, 'Dubbel Ciao Ciao', 1, 51, 110, 0, 0),
(59, 'Vesuvio', 2, 1, 70, 0, 0),
(61, 'tuna', 2, 2, 75, 0, 0),
(62, 'Hawaii', 2, 4, 75, 0, 0),
(67, 'Margareta', 3, 1, 70, 0, 0),
(71, 'Lafondo', 3, 2, 70, 0, 0),
(72, 'Bari', 3, 3, 70, 0, 0),
(73, 'Pescatore', 3, 4, 70, 0, 0),
(74, 'Bolognese', 3, 5, 70, 0, 0),
(75, 'Calzone (inbakad)', 3, 6, 70, 0, 0),
(76, 'Vesuvio', 3, 7, 70, 0, 0),
(77, 'Capricciosa', 3, 8, 75, 0, 0),
(78, 'Capri', 3, 9, 75, 0, 0),
(79, 'Hawaii', 3, 10, 75, 0, 0),
(80, 'Marinara', 3, 11, 75, 0, 0),
(81, 'Love you', 3, 12, 75, 0, 0),
(82, 'Afrikana', 3, 13, 75, 0, 0),
(83, 'Vegetariana', 3, 15, 75, 0, 0),
(84, 'bella', 3, 16, 75, 0, 0),
(85, 'campino', 3, 17, 80, 0, 0),
(86, 'amor', 3, 18, 80, 0, 0),
(87, 'Jamaica', 3, 19, 80, 0, 0),
(88, 'Disco', 3, 20, 80, 0, 0),
(89, 'quatro', 3, 21, 80, 0, 0),
(90, 'HV71', 3, 22, 80, 0, 0),
(91, 'Napoli', 3, 23, 80, 0, 0),
(92, 'amigo', 3, 24, 80, 0, 0),
(93, 'Ciao ciao (inbakad)', 3, 25, 80, 0, 0),
(94, 'Delicato', 3, 26, 80, 0, 0),
(95, 'Palermo', 3, 27, 80, 0, 0),
(96, 'Milano', 3, 28, 80, 0, 0),
(97, 'Turin', 3, 29, 80, 0, 0),
(98, 'Gourmet', 3, 30, 80, 0, 0),
(99, 'Tyson', 3, 31, 80, 0, 0),
(100, 'Italiana', 3, 32, 80, 0, 0),
(101, 'Parma', 3, 33, 80, 0, 0),
(102, 'Oskar', 3, 34, 80, 0, 0),
(103, 'Viking', 3, 35, 85, 0, 0),
(104, 'tre kronor', 3, 36, 85, 0, 0),
(105, 'M.K special', 3, 37, 85, 0, 0),
(106, 'Jönköping', 3, 39, 90, 0, 0),
(107, 'La mafia', 3, 38, 90, 0, 0),
(108, 'Opera', 3, 40, 90, 0, 0),
(109, '12an special', 3, 41, 90, 0, 0),
(110, 's:m special', 3, 42, 90, 0, 0),
(111, 'Fungi', 2, 3, 75, 0, 0),
(113, 'Capricciosa', 2, 5, 75, 0, 0),
(114, 'Capri', 2, 6, 75, 0, 0),
(115, 'Bombay', 2, 7, 80, 0, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_lvl` int(11) NOT NULL DEFAULT '0',
  `adress` varchar(255) DEFAULT '0',
  `post_nr` int(8) DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `town` int(11) DEFAULT NULL,
  `ort` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`id`, `name`, `user_lvl`, `adress`, `post_nr`, `email`, `username`, `password`, `active`, `town`, `ort`) VALUES
(2, 'Max Timje', 3, 'Jönköping 1', 55464, 'ttiimmjjee@hotmail.com', 'theSwedishScout', '$2y$10$AL1rU3OBcWFQw96nG5inreMOxZtjWFwISANZokXescWMR3CVx7VXm', 1, 1, 'Jönköping'),
(5, 'Miranda Nordholm', 3, '0', 0, 'mirnor890@hotmail.com', 'mirnor890', '$2y$10$mUZlqh0umhHqhbd1LxHbmOJhjavpylPV1Kgg/qb6S227znQq71mNm', 1, NULL, NULL),
(6, 'Annika', 3, 'Polstjärnevägen 4', 55464, 'annikasofia@gmail.com', 'Annika', '$2y$10$jE8phSzy0cUVvHr7sUk/pOD9xBl28Pggz.BEZqYR9qmuyIGbz1GcK', 1, 1, 'Jönköping'),
(7, 'Björn j Andersson', 0, 'Huskvarna 1', 454525, 'j@h.se', 'j', '$2y$10$iX.HSSaYeTofKxMJjz.AWOQ0EpvbAB1whV1UQ4U1FbLDu5raOIMhm', 0, NULL, NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `namn` (`namn`),
  ADD KEY `kategorier` (`category`);

--
-- Index för tabell `ingredienseronpizza`
--
ALTER TABLE `ingredienseronpizza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredienserOnPizza_fk0` (`ingrediens`),
  ADD KEY `ingredienserOnPizza_fk1` (`pizza`);

--
-- Index för tabell `kategorier`
--
ALTER TABLE `kategorier`
  ADD PRIMARY KEY (`namn`),
  ADD UNIQUE KEY `namn` (`namn`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User` (`user`),
  ADD KEY `Pizza` (`pizza`);

--
-- Index för tabell `pizzerior`
--
ALTER TABLE `pizzerior`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `namn` (`namn`),
  ADD KEY `town` (`town`);

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
-- AUTO_INCREMENT för tabell `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `ingredienseronpizza`
--
ALTER TABLE `ingredienseronpizza`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=590;
--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT för tabell `pizzerior`
--
ALTER TABLE `pizzerior`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT för tabell `pizzorinpizzeria`
--
ALTER TABLE `pizzorinpizzeria`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_fk0` FOREIGN KEY (`pizza`) REFERENCES `pizzorinpizzeria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_fk1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `ingredienser`
--
ALTER TABLE `ingredienser`
  ADD CONSTRAINT `kategorier` FOREIGN KEY (`category`) REFERENCES `kategorier` (`namn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `ingredienseronpizza`
--
ALTER TABLE `ingredienseronpizza`
  ADD CONSTRAINT `ingredienserOnPizza_fk0` FOREIGN KEY (`ingrediens`) REFERENCES `ingredienser` (`namn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredienserOnPizza_fk1` FOREIGN KEY (`pizza`) REFERENCES `pizzorinpizzeria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Pizza` FOREIGN KEY (`pizza`) REFERENCES `pizzorinpizzeria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `pizzerior`
--
ALTER TABLE `pizzerior`
  ADD CONSTRAINT `town` FOREIGN KEY (`town`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `pizzorinpizzeria`
--
ALTER TABLE `pizzorinpizzeria`
  ADD CONSTRAINT `pizzorInPizzeria_fk0` FOREIGN KEY (`pizzeria`) REFERENCES `pizzerior` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
