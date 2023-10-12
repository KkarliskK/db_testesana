-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 09:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `due_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `due_date`, `status`, `created_at`) VALUES
(4, 'Sagatavot mēneša pārskatu', 'Sagatavot finanšu pārskatu par pagājušo mēnesi un iesniegt vadībai', '2023-10-10', 1, '2023-09-26'),
(7, 'Sagatavot budžetu', 'Sagatavot nākamā gada budžeta priekšlikumu un apstiprināšanai iesniegt finanšu departamentam', '2023-10-13', 1, '2023-09-26'),
(8, 'Sastādīt darba grupas sēdes protokolu', 'Sastādīt protokolu par darba grupas sēdi un izsūtīt dalībniekiem', '2023-10-13', 0, '2023-09-26'),
(9, 'TITLEW 124124', 'Pabeigt klienta projektu un izsniegt gala ziņojumu', '2023-11-20', 1, '2023-09-26'),
(10, 'Izveidot jaunas produktu specifikācijas', 'Izstrādāt un apstiprināt jaunas produktu specifikācijas sadarbībā ar inženieriem', '2023-11-25', 0, '2023-09-26'),
(12, 'test task', 'testing the created date', '2023-10-14', 0, '0000-00-00'),
(13, 'Test 2', 'Testing the date again', '2023-10-13', 1, '2023-10-11'),
(14, 'Testing date', 'Date test lol ausfgiaubf ujba;dujgb aubdgiuabsf ;ljui', '2023-10-14', 0, '2023-10-11'),
(15, '9 nov', '9now', '2023-11-09', 0, '2023-10-11'),
(16, '13 dec', '13 decausfbouasbd f', '2023-12-13', 0, '2023-10-11'),
(17, 'The lost task', 'The task who got left at home', '2014-10-11', 0, '2016-10-06'),
(18, 'asd', 'asd', '2023-10-02', 0, '2023-10-11'),
(19, 'TESTING', 'LOASIFJNIUASBF O', '2023-10-02', 0, '2023-10-11'),
(20, 'asd', 'asdasdasd', '2023-10-02', 0, '2023-10-11'),
(21, 'asd', 'asd', '2023-10-24', 0, '2023-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `username`, `password`) VALUES
(1, '', 'KkarliskK', 'test123'),
(2, 'asd', 'asd', '$2y$10$FNh7GarcZu0cc/H1WyCnHeilqJy/GVhKtXulktU4s18pzkEDNhfwu'),
(3, 'asd', 'asd', '$2y$10$952XlB/SztElCW.X3Clr0u9WUX6nSLxG4AXNf2dwx8lvEiyktAYcm'),
(4, 'asd', 'asd', '$2y$10$KNYnKe6bIZ7pBL/AsGPCb.jW7vdZHj0wNC09X35w.a9TasTnkI9TC'),
(5, 'asd', 'asd', '$2y$10$CUi5qv.RESU/DevcGHdgLebI0WlFGfvc4Om6BDDx.nslZeR0e6tK.'),
(6, 'karlis birkavs', 'kkarliskk', '$2y$10$bzLYcQx8.OnaRPxBS3qNHeqHnxi6EhftAG6cdT6Xyk8CAcat4sy7K'),
(7, 'KARLIS', 'karlis', '$2y$10$HBuGc5Jpxmdxa5ggVdNzGunDeITp7o4rB8eNzAJB0NF22OSPaNWqe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
