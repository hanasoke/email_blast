-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2025 at 03:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email_blast_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_blasts`
--

CREATE TABLE `email_blasts` (
  `id` int(11) NOT NULL,
  `hrd_emails` text NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `user_emails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_blasts`
--

INSERT INTO `email_blasts` (`id`, `hrd_emails`, `title`, `message`, `user_emails`) VALUES
(1, 'hanasoke@gmail.com, hanasbayupratama@gmail.com', 'Bangun Woy', 'Bangun Pagi Woy', 'saitama@gmail.com,clorismenbekasi7@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_blasts`
--
ALTER TABLE `email_blasts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_blasts`
--
ALTER TABLE `email_blasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
