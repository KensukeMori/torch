-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `torch`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `item`
--

CREATE TABLE `item` (
  `ItemId` int(11) NOT NULL,
  `ItemType` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `SequenceId` int(11) NOT NULL,
  `stageId` int(11) NOT NULL,
  `Time` double(4,1) NOT NULL DEFAULT '3.0',
  `XCoordinate` double(5,2) NOT NULL,
  `YCoordinate` double(5,2) NOT NULL DEFAULT '0.00',
  `ZCoordinate` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `item`
--

INSERT INTO `item` (`ItemId`, `ItemType`, `UserId`, `SequenceId`, `stageId`, `Time`, `XCoordinate`, `YCoordinate`, `ZCoordinate`) VALUES
(84, 1, 20, 1, 1, 1.2, 0.30, 0.00, 0.30),
(85, 1, 20, 1, 1, 3.8, 5.36, 0.00, 2.65),
(86, 1, 20, 1, 1, 6.4, 8.87, 0.00, 8.81),
(87, 1, 20, 1, 1, 8.4, 7.19, 0.00, 14.20),
(88, 1, 20, 1, 1, 10.3, 7.61, 0.00, 19.45),
(89, 1, 20, 1, 1, 13.9, -0.08, 0.00, 22.34),
(90, 1, 20, 1, 1, 16.0, -5.65, 0.00, 20.16),
(91, 1, 20, 1, 1, 18.1, -10.37, 0.00, 16.04),
(92, 1, 20, 1, 1, 20.7, -16.02, 0.00, 10.82),
(93, 1, 20, 1, 1, 22.4, -14.58, 0.00, 6.85),
(94, 2, 20, 1, 1, 22.4, -14.58, 0.00, 6.85),
(95, 1, 20, 2, 1, 0.8, 0.30, 0.00, 0.30),
(96, 1, 20, 2, 1, 3.9, 0.65, 0.00, -5.59),
(97, 1, 20, 2, 1, 5.9, -1.16, 0.00, -11.09),
(98, 1, 20, 2, 1, 7.7, 0.79, 0.00, -15.08),
(99, 1, 20, 2, 1, 9.8, 6.96, 0.00, -15.43),
(100, 1, 20, 2, 1, 12.3, 13.92, 0.00, -12.70),
(101, 1, 20, 2, 1, 15.2, 20.87, 0.00, -9.52),
(102, 1, 20, 2, 1, 17.5, 21.19, 0.00, -2.66),
(103, 1, 20, 2, 1, 19.4, 19.77, 0.00, 2.72),
(104, 1, 20, 2, 1, 21.6, 20.80, 0.00, 8.61),
(105, 2, 20, 2, 1, 21.6, 20.80, 0.00, 8.61),
(106, 1, 20, 3, 1, 0.7, 0.30, 0.00, 0.30),
(107, 1, 20, 3, 1, 3.9, 5.40, 0.00, -2.03),
(108, 1, 20, 3, 1, 5.9, 6.39, 0.00, -7.53),
(109, 1, 20, 3, 1, 8.5, 12.56, 0.00, -8.47),
(110, 1, 20, 3, 1, 12.2, 19.02, 0.00, -10.28),
(111, 1, 20, 3, 1, 16.1, 18.57, 0.00, -0.04),
(112, 1, 20, 3, 1, 18.7, 17.77, 0.00, 7.62),
(113, 1, 20, 3, 1, 20.7, 17.48, 0.00, 13.06),
(114, 3, 20, 3, 1, 23.3, 20.15, 0.00, 18.90),
(115, 1, 20, 4, 1, 1.8, 0.30, 0.00, 0.30),
(116, 1, 20, 4, 1, 6.0, 6.10, 0.00, -7.53),
(117, 1, 20, 4, 1, 7.6, 5.71, 0.00, -11.89),
(118, 1, 20, 4, 1, 8.8, 6.84, 0.00, -15.14),
(119, 1, 20, 4, 1, 10.1, 10.47, 0.00, -16.19),
(120, 3, 20, 4, 1, 12.1, 13.69, 0.00, -18.67),
(121, 1, 20, 5, 1, 15.1, 0.30, 0.00, 0.30),
(122, 1, 20, 5, 1, 17.8, 5.49, 0.00, 0.62),
(123, 1, 20, 5, 1, 19.9, 11.49, 0.00, -0.70),
(124, 1, 20, 5, 1, 21.4, 15.90, 0.00, -0.48),
(125, 1, 20, 5, 1, 23.6, 21.25, 0.00, 3.13),
(126, 1, 20, 5, 1, 25.9, 24.85, 0.00, 0.54),
(127, 1, 20, 5, 1, 28.2, 24.82, 0.00, -6.36),
(128, 1, 20, 5, 1, 30.4, 25.06, 0.00, -12.46),
(129, 1, 20, 5, 1, 31.9, 23.77, 0.00, -16.57),
(130, 1, 20, 5, 1, 34.5, 17.14, 0.00, -19.22),
(131, 2, 20, 5, 1, 34.5, 17.14, 0.00, -19.22),
(132, 1, 21, 1, 1, 1.5, 0.30, 0.00, 0.30),
(133, 1, 21, 1, 1, 5.1, 4.34, 0.00, 0.81),
(134, 1, 21, 1, 1, 7.2, 8.55, 0.00, 4.96),
(135, 1, 21, 1, 1, 9.4, 10.07, 0.00, 11.26),
(136, 1, 21, 1, 1, 11.1, 6.59, 0.00, 14.59),
(137, 1, 21, 1, 1, 15.2, -2.87, 0.00, 21.77),
(138, 1, 21, 1, 1, 17.0, -8.00, 0.00, 21.61),
(139, 1, 21, 1, 1, 18.4, -11.95, 0.00, 21.21),
(140, 4, 21, 1, 1, 20.1, -15.83, 0.00, 17.82),
(141, 1, 22, 1, 1, 1.6, 0.30, 0.00, 0.30),
(142, 1, 22, 1, 1, 3.3, -1.09, 0.00, -1.06),
(143, 1, 22, 1, 1, 5.1, -3.53, 0.00, 0.47),
(144, 1, 22, 1, 1, 7.1, -8.66, 0.00, 3.11),
(145, 1, 22, 1, 1, 8.8, -13.41, 0.00, 1.94),
(146, 1, 22, 1, 1, 11.1, -13.91, 0.00, -4.09),
(147, 1, 22, 1, 1, 12.9, -15.46, 0.00, -8.73),
(148, 1, 22, 1, 1, 16.9, -20.08, 0.00, 0.05),
(149, 1, 22, 1, 1, 25.2, -21.05, 0.00, -19.24),
(150, 1, 22, 1, 1, 29.1, -11.51, 0.00, -22.73),
(151, 2, 22, 1, 1, 29.1, -11.51, 0.00, -22.73),
(152, 1, 22, 2, 1, 1.0, 0.30, 0.00, 0.30),
(153, 1, 22, 2, 1, 2.7, -1.54, 0.00, -0.57),
(154, 1, 22, 2, 1, 4.8, -5.25, 0.00, 2.20),
(155, 1, 22, 2, 1, 9.0, -16.16, 0.00, 6.39),
(156, 1, 22, 2, 1, 11.5, -18.85, 0.00, 12.73),
(157, 1, 22, 2, 1, 14.5, -15.20, 0.00, 19.74),
(158, 4, 22, 2, 1, 19.2, -15.80, 0.00, 18.43),
(159, 1, 23, 1, 1, 1.1, 0.30, 0.00, 0.30),
(160, 1, 23, 1, 1, 3.7, -2.90, 0.00, -1.50),
(161, 1, 23, 1, 1, 5.0, -5.08, 0.00, -3.81),
(162, 1, 23, 1, 1, 6.5, -8.36, 0.00, -5.52),
(163, 1, 23, 1, 1, 8.1, -8.35, 0.00, -10.19),
(164, 1, 23, 1, 1, 9.8, -4.42, 0.00, -12.39),
(165, 1, 23, 1, 1, 17.2, 9.47, 0.00, 1.19),
(166, 1, 23, 1, 1, 22.2, 18.83, 0.00, -5.88),
(167, 1, 23, 1, 1, 26.5, 16.59, 0.00, -17.71),
(168, 3, 23, 1, 1, 27.7, 14.49, 0.00, -18.72);

-- --------------------------------------------------------

--
-- テーブルの構造 `itemtype`
--

CREATE TABLE `itemtype` (
  `ItemTypeId` int(11) NOT NULL,
  `ItemType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `itemtype`
--

INSERT INTO `itemtype` (`ItemTypeId`, `ItemType`) VALUES
(1, 'Torch'),
(2, 'DeadPoint'),
(3, 'Exit'),
(4, 'Exit2');

-- --------------------------------------------------------

--
-- テーブルの構造 `stage`
--

CREATE TABLE `stage` (
  `stageId` int(11) NOT NULL,
  `stageName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `stage`
--

INSERT INTO `stage` (`stageId`, `stageName`) VALUES
(1, 'Test'),
(2, 'Title'),
(3, 'Stage1');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TotalSequence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`UserId`, `Name`, `Date`, `TotalSequence`) VALUES
(20, 'sato', '2019-03-29 07:08:34', 7),
(21, 'taro', '2019-03-29 07:09:10', 1),
(22, 'mori', '2019-03-29 07:10:20', 2),
(23, '66', '2019-03-29 07:11:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemId`);

--
-- Indexes for table `itemtype`
--
ALTER TABLE `itemtype`
  ADD PRIMARY KEY (`ItemTypeId`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`stageId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `itemtype`
--
ALTER TABLE `itemtype`
  MODIFY `ItemTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `stageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
