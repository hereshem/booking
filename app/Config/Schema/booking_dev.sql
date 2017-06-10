-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2017 at 05:07 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `booking_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seatNames` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `seatCount` int(11) NOT NULL,
  `subTotal` float NOT NULL,
  `totalAmount` float NOT NULL,
  `file` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `address`, `phone`, `schedule_id`, `user_id`, `seatNames`, `seatCount`, `subTotal`, `totalAmount`, `file`, `created`, `modified`) VALUES
(4, 'Hem', 'Lalbandi', '981234', 2, 1, '1,4,5', 3, 2200, 2200, 'abcd', '2017-06-08 20:44:45', '2017-06-08 20:44:45'),
(6, 'asdfas', 'sadgfsa', 'asdgas', 1, 1, '9,10', 2, 1300, 1300, 'sdga', '2017-06-08 20:48:51', '2017-06-08 20:48:51'),
(12, 'Hem', 'Lalbandi', '98431234523', 1, 1, '2,3,4', 3, 2200, 2200, 'myfile', '2017-06-09 13:43:41', '2017-06-09 13:43:41'),
(14, 'Yubaraj', 'Ktm', '984346', 1, 1, '1,7', 2, 1450, 1450, 'hfhj', '2017-06-09 13:54:34', '2017-06-09 13:54:34'),
(16, 'Hem', 'Lalbandi', '984301243', 4, 1, 'D2,D3', 2, 1500, 1500, 'dfas', '2017-06-10 13:29:11', '2017-06-10 13:29:11'),
(17, 'RamHari', 'Kapan', '897435', 1, 1, '6', 1, 700, 700, 'gvsdf', '2017-06-10 14:59:00', '2017-06-10 14:59:00'),
(18, 'hem', 'lal', '97835', 5, 1, '6,7', 2, 1000, 1000, 'asdg', '2017-06-10 15:40:01', '2017-06-10 15:40:01'),
(19, 'Ashok', 'ktm', '98234t2', 3, 1, '11,12,13,14', 4, 2000, 2000, 'zxcv', '2017-06-10 15:41:03', '2017-06-10 15:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE ucs2_unicode_ci DEFAULT NULL,
  `vehicle_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `route` varchar(255) COLLATE ucs2_unicode_ci DEFAULT NULL,
  `published` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `name`, `vehicle_id`, `time`, `route`, `published`, `created`, `modified`) VALUES
(1, '8th June Morning', 1, '2017-06-08 06:30:00', 'lalbandi hetauda kulekhani balkhu', 1, '2017-06-07 14:36:09', '2017-06-08 15:24:59'),
(2, '8th June Beluka', 1, '2017-06-08 14:30:00', 'lalbandi hetauda ghumdai ktm', 1, '2017-06-07 17:20:26', '2017-06-07 17:20:26'),
(3, '10 June morning', 2, '2017-06-10 07:00:00', 'ktm pok', 1, '2017-06-09 13:59:24', '2017-06-10 15:37:20'),
(4, 'Saturday thulo bus', 3, '2017-06-10 08:00:00', 'picnic', 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(5, 'Sunday 11 morning Winger', 4, '2017-06-11 20:00:00', 'naranghat', 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `name`, `schedule_id`, `status`, `price`, `published`, `created`, `modified`) VALUES
(74, '1', 2, 3, 800, 1, '2017-06-07 17:20:26', '2017-06-08 20:22:18'),
(75, '2', 2, 1, 800, 1, '2017-06-07 17:20:26', '2017-06-09 13:48:48'),
(76, '3', 2, 1, 700, 1, '2017-06-07 17:20:26', '2017-06-07 17:20:26'),
(77, '4', 2, 3, 700, 1, '2017-06-07 17:20:26', '2017-06-07 17:20:26'),
(78, '5', 2, 3, 700, 1, '2017-06-07 17:20:26', '2017-06-07 17:20:26'),
(79, '6', 2, 1, 700, 1, '2017-06-07 17:20:26', '2017-06-09 13:49:27'),
(80, '7', 2, 1, 650, 1, '2017-06-07 17:20:26', '2017-06-09 13:49:32'),
(81, '8', 2, 1, 650, 1, '2017-06-07 17:20:26', '2017-06-09 13:49:09'),
(82, '9', 2, 1, 650, 1, '2017-06-07 17:20:26', '2017-06-07 17:20:26'),
(83, '10', 2, 3, 650, 1, '2017-06-07 17:20:26', '2017-06-07 17:20:26'),
(84, '1', 1, 3, 800, 1, '2017-06-08 15:24:59', '2017-06-09 13:42:46'),
(85, '2', 1, 3, 800, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(86, '3', 1, 3, 700, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(87, '4', 1, 3, 700, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(88, '5', 1, 1, 700, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(89, '6', 1, 3, 700, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(90, '7', 1, 3, 650, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(91, '8', 1, 1, 650, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(92, '9', 1, 3, 650, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(93, '10', 1, 3, 650, 1, '2017-06-08 15:24:59', '2017-06-08 15:24:59'),
(109, 'C1', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(110, 'C2', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(111, 'C3', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(112, 'C4', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(113, 'B1', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(114, 'B2', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(115, 'A1', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(116, 'A2', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(117, 'B3', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(118, 'B4', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(119, 'A3', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(120, 'A4', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(121, 'B5', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(122, 'B6', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(123, 'A5', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(124, 'A6', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(125, 'B7', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(126, 'B8', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(127, 'A7', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(128, 'A8', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(129, 'B9', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(130, 'B10', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(131, 'A9', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(132, 'A10', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(133, 'B11', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(134, 'B12', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(135, 'A11', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(136, 'A12', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(137, 'B13', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(138, 'B14', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(139, 'A13', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(140, 'A14', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(141, 'B15', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(142, 'B16', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(143, 'A15', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(144, 'A16', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(145, 'B17', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(146, 'B18', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(147, 'A17', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(148, 'A18', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(149, 'B19', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(150, 'B20', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(151, 'D1', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(152, 'D2', 4, 3, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(153, 'D3', 4, 3, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(154, 'D4', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(155, 'D5', 4, 1, 750, 1, '2017-06-09 19:14:47', '2017-06-09 19:14:47'),
(156, 'A', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(157, 'B', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(158, '1', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(159, '2', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(160, '3', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(161, '4', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(162, '5', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(163, '6', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(164, '7', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(165, '8', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(166, '9', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(167, '10', 3, 1, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(168, '11', 3, 3, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(169, '12', 3, 3, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(170, '13', 3, 3, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(171, '14', 3, 3, 500, 1, '2017-06-10 15:37:20', '2017-06-10 15:37:20'),
(172, 'A', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(173, 'B', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(174, '1', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(175, '2', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(176, '3', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(177, '4', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(178, '5', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(179, '6', 5, 3, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(180, '7', 5, 3, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(181, '8', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(182, '9', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(183, '10', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10'),
(184, '11', 5, 1, 500, 1, '2017-06-10 15:39:10', '2017-06-10 15:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `templateseats`
--

CREATE TABLE IF NOT EXISTS `templateseats` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE ucs2_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE ucs2_unicode_ci DEFAULT NULL,
  `html` text COLLATE ucs2_unicode_ci,
  `seatCount` int(11) NOT NULL,
  `seatNames` text COLLATE ucs2_unicode_ci NOT NULL,
  `seatPrices` text COLLATE ucs2_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `templateseats`
--

INSERT INTO `templateseats` (`id`, `name`, `photo`, `html`, `seatCount`, `seatNames`, `seatPrices`, `published`, `created`, `modified`) VALUES
(1, 'TataSumo', 'tatasumo', '<table>\r\n<tbody>\r\n<tr>\r\n	<td class="seat">1</td><td></td><td></td><td></td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">2</td><td class="seat">3</td><td class="seat">4</td><td class="seat">5</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">6</td><td class="seat">7</td><td class="seat">8</td><td class="seat">9</td>\r\n</tr>\r\n</tbody>\r\n</table>', 9, '1,2,3,4,5,6,7,8,9', '800,700,700,700,700,650,650,650,650', 1, '2017-06-07 14:33:03', '2017-06-09 19:12:03'),
(2, 'WingerTemplate', '', '<table>\r\n<tbody>\r\n<tr>\r\n	<td class="seat">A</td><td class="seat">B</td><td></td><td></td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">1</td><td class="seat">2</td><td class="seat">3</td><td class="seat">4</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">5</td><td></td><td class="seat">6</td><td class="seat">7</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">8</td><td class="seat">9</td><td class="seat">10</td><td class="seat">11</td>\r\n</tr>\r\n</tbody>\r\n</table>', 13, 'A,B,1,2,3,4,5,6,7,8,9,10,11', '500,500,500,500,500,500,500,500,500,500,500,500,500', 1, '2017-06-09 13:52:22', '2017-06-10 14:52:06'),
(3, 'BusTemplate', 'bus photo', '<table>\r\n<tbody>\r\n<tr>\r\n	<td class="seat">C1</td><td class="seat">C2</td><td></td><td></td><td></td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">C3</td><td class="seat">C4</td><td></td><td></td><td></td>\r\n</tr>\r\n<tr>\r\n	<td></td><td></td><td></td><td class="seat">B1</td><td class="seat">B2</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A1</td><td class="seat">A2</td><td></td><td class="seat">B3</td><td class="seat">B4</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A3</td><td class="seat">A4</td><td></td><td class="seat">B5</td><td class="seat">B6</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A5</td><td class="seat">A6</td><td></td><td class="seat">B7</td><td class="seat">B8</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A7</td><td class="seat">A8</td><td></td><td class="seat">B9</td><td class="seat">B10</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A9</td><td class="seat">A10</td><td></td><td class="seat">B11</td><td class="seat">B12</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A11</td><td class="seat">A12</td><td></td><td class="seat">B13</td><td class="seat">B14</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A13</td><td class="seat">A14</td><td></td><td class="seat">B15</td><td class="seat">B16</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A15</td><td class="seat">A16</td><td></td><td class="seat">B17</td><td class="seat">B18</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">A17</td><td class="seat">A18</td><td></td><td class="seat">B19</td><td class="seat">B20</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">D1</td><td class="seat">D2</td><td class="seat">D3</td><td class="seat">D4</td><td class="seat">D5</td>\r\n</tr>\r\n</tbody>\r\n</table>', 47, 'C1,C2,C3,C4,B1,B2,A1,A2,B3,B4,A3,A4,B5,B6,A5,A6,B7,B8,A7,A8,B9,B10,A9,A10,B11,B12,A11,A12,B13,B14,A13,A14,B15,B16,A15,A16,B17,B18,A17,A18,B19,B20,D1,D2,D3,D4,D5', '750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750', 1, '2017-06-09 19:00:38', '2017-06-09 19:00:38'),
(4, 'HyaceTemplate', '', '<table>\r\n<tbody>\r\n<tr>\r\n	<td class="seat">A</td><td class="seat">B</td><td></td><td></td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">1</td><td class="seat">2</td><td class="seat">3</td><td class="seat">4</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">5</td><td></td><td class="seat">6</td><td class="seat">7</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">8</td><td></td><td class="seat">9</td><td class="seat">10</td>\r\n</tr>\r\n<tr>\r\n	<td class="seat">11</td><td class="seat">12</td><td class="seat">13</td><td class="seat">14</td>\r\n</tr>\r\n</tbody>\r\n</table>', 16, 'A,B,1,2,3,4,5,6,7,8,9,10,11,12,13,14', '500,500,500,500,500,500,500,500,500,500,500,500,500,500,500,500,500', 1, '2017-06-10 14:51:36', '2017-06-10 15:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE IF NOT EXISTS `travels` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `description` text COLLATE ucs2_unicode_ci,
  `address` text COLLATE ucs2_unicode_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `published` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `name`, `description`, `address`, `created`, `modified`, `published`) VALUES
(1, 'Buddha Bhumi Yatayat', 'Buddha bhumi yatayat running from sarlahi to Kathmandu', 'Lalbandi, Sarlahi', '2017-06-07 14:24:56', '2017-06-07 14:24:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `address` text COLLATE ucs2_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `phone`, `email`, `password`, `status`, `created`, `modified`) VALUES
(1, 'Hem', 'Shrestha', 'Lalbandi\r\nSarlahi', '9843096958', 'hereshem@gmail.com', '123456', 1, '2017-06-07 14:23:35', '2017-06-07 14:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `description` text COLLATE ucs2_unicode_ci NOT NULL,
  `plateNumber` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `travel_id` int(11) NOT NULL,
  `hasAC` tinyint(4) NOT NULL,
  `templateseat_id` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `description`, `plateNumber`, `route`, `travel_id`, `hasAC`, `templateseat_id`, `published`, `created`, `modified`) VALUES
(1, 'Tata Sumo Buddha Bhumi', 'Lalbandi - Kathmandu route', 'ba 6 pa 2630', 'lalbandi bardibas sindhuli kathmandu', 1, 0, 1, 1, '2017-06-07 14:34:47', '2017-06-07 14:34:47'),
(2, 'Hyace', 'Hyace', 'na 2 kha 34634', 'ktm pok', 1, 1, 4, 1, '2017-06-09 13:58:25', '2017-06-10 15:34:32'),
(3, 'School Bus', 'new bus', 'ba 2 kha 2135423', 'alksdgao kasdjgka', 1, 1, 3, 1, '2017-06-09 19:13:38', '2017-06-09 19:13:38'),
(4, 'Winger', 'Winger', 'na 3 pa 234', 'naranghat', 1, 0, 2, 1, '2017-06-10 15:38:16', '2017-06-10 15:38:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templateseats`
--
ALTER TABLE `templateseats`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `templateseats`
--
ALTER TABLE `templateseats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
