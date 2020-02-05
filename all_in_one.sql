-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 03, 2020 at 08:55 AM
-- Server version: 8.0.15
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `all_in_one`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(15) NOT NULL,
  `id_creater` int(15) NOT NULL,
  `id_art` int(15) NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pubdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `id_creater`, `id_art`, `text`) VALUES
(11, 17, 16, 'wwww');

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id` int(15) NOT NULL,
  `id_creater` int(15) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pubdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `pinned` int(1) DEFAULT NULL,
  `closed` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id`, `id_creater`, `title`, `text`, `pinned`, `closed`) VALUES
(14, 17, 'Aaaaaaa', 'qq', NULL, NULL),
(15, 17, 'qq', 'qq', NULL, NULL),
(16, 17, 'qq', 'qq', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hash_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_vac` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `secur_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `nick` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `hash_email`, `email_vac`, `email_id`, `secur_key`, `password`, `adm`, `nick`, `bio`, `img`) VALUES
(1, 'admin@admin', 'a3175a452c7a8fea80c62a198a40f6c9', 'TRUE', NULL, '9AJB5NCZSXupibFPtVasImHxOKwvy0cWEg38k1zUL72T4nhGqeQlRrjMDfdY6', '7b24afc8bc80e548d66c4e7ff72171c5', '1', 'root', 'Only for admin', NULL),
(17, 'q@q', '4aba2310438b9b590ea3a5524740dff5', 'TRUE', 'WOYeDT7nX1U8bkuVKLadhtqv5yr9ER6JxPC0sjipgZGHwIFczml2f4SQMBAN3', 'EWXQFYmTLs2GyO4IvdkUt3JZjSb9nq61gNPz5RHhpMDx7l0wVKBAfr8ueCcai', '099b3b060154898840f0ebdfb46ec78f', NULL, 'q', 'qqqqqq', '2ygaMCSDiEY.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
