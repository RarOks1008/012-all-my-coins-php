-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 06:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `all_my_coins`
--

-- --------------------------------------------------------

--
-- Table structure for table `coin`
--

CREATE TABLE `coin` (
  `id` int(11) NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pictures_id` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emperor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shape_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `edge_id` int(11) DEFAULT NULL,
  `composition_id` int(11) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `diameter` double DEFAULT NULL,
  `thickness` double DEFAULT NULL,
  `reference` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certified` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `demonetized` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coin`
--

INSERT INTO `coin` (`id`, `value`, `pictures_id`, `year`, `country`, `emperor`, `shape_id`, `grade_id`, `edge_id`, `composition_id`, `weight`, `diameter`, `thickness`, `reference`, `certified`, `demonetized`, `comment`) VALUES
(2, '1 Dinar', 13, 1938, 'Kingdom of Yugoslavia', 'Peter II', 1, 1, 1, 1, 3.5, 21, 1.57, 'KM# 19', 'No', 1, 'My first coin insert in app'),
(3, '1 Para', 14, 1868, 'Serbia', 'Michael Obrenovic III', 1, 4, 12, 46, 1, 15, 0, 'KM# 1', 'No', 1, 'My second coin without thickness.'),
(6, 'Coin 1', NULL, 1847, 'Some state', '', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(7, 'Test', NULL, 1, 'Test', '', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(8, 'Unknown', 17, 0, 'Unknown', '', 1, 1, 1, 6, 0, 0, 0, '', 'No', 0, ''),
(9, 'Random', NULL, 1000, 'Random', 'Some king', 14, 5, 6, 17, 0, 0, 0, '', 'No', 0, ''),
(10, 'ABS ', NULL, 996, 'ABGG', 'AG Fs', 14, 5, 6, 17, 0, 0, 0, '', 'No', 0, ''),
(11, '1 Coin', NULL, 1900, 'Some State Country', 'Ruler X', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(12, '1 Coin', NULL, 1900, 'Some State Country', 'Ruler X', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(15, '1 Coin', 21, 1901, 'Some State Country', 'Ruler X', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(21, 'Nesto', NULL, -2421, 'Kingdom of SS', '', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(22, 'Deseto', NULL, 29372, 'akubbakusa', '', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(24, '1 hi', NULL, 229, 'jfeuds', '', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(27, '10 NekihParica', NULL, 1057, 'Neka Drzava', '', 1, 1, 1, 1, 0, 0, 0, '', 'No', 0, ''),
(28, '1 Ruble', 22, 1924, 'Soviet Union', '', 1, 6, 1, 13, 20, 33.5, 2.6, 'Y# 90.1', 'No', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `composition`
--

CREATE TABLE `composition` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `composition`
--

INSERT INTO `composition` (`id`, `name`) VALUES
(1, 'Aluminum'),
(2, 'Antimony'),
(46, 'Bronze'),
(16, 'Cadmium'),
(3, 'Carbon'),
(38, 'Cardboard'),
(39, 'Ceramics'),
(4, 'Chromium'),
(17, 'Cobalt'),
(42, 'Compressed charcoal'),
(5, 'Copper'),
(44, 'Fiber'),
(6, 'Gold'),
(18, 'Hafnium'),
(19, 'Iridium'),
(7, 'Iron'),
(8, 'Lead'),
(40, 'Leather'),
(10, 'Magnesium'),
(9, 'Manganese'),
(20, 'Molybdeum'),
(11, 'Nickel'),
(21, 'Niobium'),
(22, 'Palladium'),
(35, 'Paper'),
(41, 'Plastic'),
(12, 'Platinum'),
(43, 'Porcelain'),
(23, 'Rhenium'),
(24, 'Rhodium'),
(25, 'Ruthenium'),
(26, 'Selenium'),
(27, 'Silicon'),
(45, 'Silm'),
(13, 'Silver'),
(37, 'Stone'),
(28, 'Tantalum'),
(29, 'Tellurium'),
(14, 'Tin'),
(30, 'Titanium'),
(31, 'Tungsten'),
(32, 'Uranium'),
(33, 'Vanadium'),
(36, 'Wood'),
(15, 'Zinc'),
(34, 'Zirconium');

-- --------------------------------------------------------

--
-- Table structure for table `edge`
--

CREATE TABLE `edge` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `edge`
--

INSERT INTO `edge` (`id`, `name`) VALUES
(6, 'Decorated'),
(2, 'Grooved'),
(9, 'Herringbone'),
(8, 'Indented'),
(5, 'Inscribed'),
(7, 'Interrupted reeded'),
(1, 'Plain'),
(11, 'Pollygons'),
(3, 'Reeded'),
(4, 'Security'),
(10, 'Serrated'),
(12, 'Smooth');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(6, 'About uncirculated - UNC'),
(5, 'Extremely fine - XF'),
(3, 'Fine - F'),
(1, 'Good - G'),
(7, 'Mint state - BU'),
(8, 'Mint state - FDC'),
(4, 'Very fine - VF'),
(2, 'Very Good - VG');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `observe_pic` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observe_writing` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reverse_pic` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reverse_writing` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `observe_pic`, `observe_writing`, `reverse_pic`, `reverse_writing`) VALUES
(13, '1589377453o.png', 'Kingdom of Yugoslavia', '1589377453r.png', '1 DINAR 1938'),
(14, '1589377883o.png', 'Obrenovic III Prince of Serbia', '1589377884r.png', '1 Para 1868'),
(17, '1589378537o.png', '', '', ''),
(21, '1589460537r.png', 'My name is Jeyy', '1589460645r.png', ''),
(22, '1592582632o.png', 'Workers of the world, unite!', '1592582632r.png', '1924 year');

-- --------------------------------------------------------

--
-- Table structure for table `shape`
--

CREATE TABLE `shape` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shape`
--

INSERT INTO `shape` (`id`, `name`) VALUES
(8, 'Decagonal'),
(10, 'Dodecagonal'),
(9, 'Hendecagonal'),
(5, 'Heptagonal'),
(4, 'Hexagonal'),
(14, 'Holed'),
(7, 'Nonagonal'),
(6, 'Octagonal'),
(12, 'Pentadecagonal'),
(3, 'Pentagonal'),
(1, 'Round'),
(13, 'Scalloped'),
(15, 'Spanish flower'),
(2, 'Squares and diamonds'),
(11, 'Tridecagonal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coin`
--
ALTER TABLE `coin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_id` (`pictures_id`),
  ADD KEY `shape_id` (`shape_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `edge_id` (`edge_id`),
  ADD KEY `composition_id` (`composition_id`);

--
-- Indexes for table `composition`
--
ALTER TABLE `composition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `edge`
--
ALTER TABLE `edge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shape`
--
ALTER TABLE `shape`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coin`
--
ALTER TABLE `coin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `composition`
--
ALTER TABLE `composition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `edge`
--
ALTER TABLE `edge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `shape`
--
ALTER TABLE `shape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coin`
--
ALTER TABLE `coin`
  ADD CONSTRAINT `coin_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `coin_ibfk_3` FOREIGN KEY (`composition_id`) REFERENCES `composition` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `coin_ibfk_4` FOREIGN KEY (`shape_id`) REFERENCES `shape` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `coin_ibfk_5` FOREIGN KEY (`edge_id`) REFERENCES `edge` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `coin_ibfk_6` FOREIGN KEY (`pictures_id`) REFERENCES `picture` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
