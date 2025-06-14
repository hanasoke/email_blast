-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 10:56 AM
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
(1, 'hanasoke@gmail.com, hanasbayupratama@gmail.com', 'Bangun Woy', 'Bangun Pagi Woy', 'saitama@gmail.com,clorismenbekasi7@gmail.com'),
(3, 'hanasoke@gmail.com, hanasbayupratama@gmail.com', 'wqsdawasd', 'wqdsaqwasqwdsa', 'saitama@gmail.com'),
(4, 'hanasoke@outlook.com', 'swaqwsqad', 'dwASdwwd', 'clorismenbekasi7@gmail.com'),
(6, 'hanasoke@gmail.com, hanasbayupratama@gmail.com', 'wqsqwsad', 'wsqawqswqd', 'clorismenbekasi7@gmail.com'),
(7, 'hanasoke@outlook.com', 'saWSAQD', 'wDSQAWDSQA', 'saitama@gmail.com,clorismenbekasi7@gmail.com'),
(8, 'hanasoke@outlook.com', 'wqdsqwDSA', 'wqdSqwDS', 'saitama@gmail.com,clorismenbekasi7@gmail.com'),
(9, 'hanasoke@outlook.com', 'dwswsqa', 'wdsaqwdq', 'clorismenbekasi7@gmail.com'),
(10, 'hanasoke@gmail.com, hanasbayupratama@gmail.com', 'wsewe', 's2ws2ws3e', 'saitama@gmail.com'),
(11, 'clorismenbekasi7@gmail.com', 'Jalan Lurus', 'Jalan Lurus dan Tak Berkelok', 'hanasoke@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `address`, `created_at`) VALUES
(1, 'saitama', 'saitama', 'saitama@gmail.com', 'Komp Parpostel No.56', '2025-06-05 01:36:22'),
(2, ' Tukang Skin Care', 'skin care ku', 'clorismenbekasi7@gmail.com', 'Nurudin Zenski', '2025-06-05 01:37:25'),
(3, ' Hanas', 'hanasbp', 'hanasoke@yahoo.com', 'Jl Sutarman No.56', '2025-06-12 02:21:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_blasts`
--
ALTER TABLE `email_blasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_blasts`
--
ALTER TABLE `email_blasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
