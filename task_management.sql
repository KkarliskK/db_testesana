-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 10:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `due_date`, `status`, `created_at`) VALUES
(1, 'Izstrādāt pētījuma priekšlikumu', 'Izstrādāt pētījuma priekšlikumu par klienta vajadzībām un iespējamiem risinājumiem.', '2023-10-15', 0, '2023-09-26'),
(2, 'Sagatavot prezentāciju', 'Sagatavot prezentāciju par jauno produktu un pārstāvēt to klientiem', '2023-10-20', 0, '2023-09-26'),
(3, 'Izstrādāt mārketinga kampaņu', 'Izveidot un uzsākt mārketinga kampaņu sociālajos tīklos un interneta reklāmā.', '2023-10-25', 0, '2023-09-26'),
(4, 'Sagatavot mēneša pārskatu', 'Sagatavot finanšu pārskatu par pagājušo mēnesi un iesniegt vadībai', '2023-10-10', 1, '2023-09-26'),
(5, 'Sastādīt projektu plānu', 'Sastādīt detalizētu projektu plānu un noteikt resursu pieejamību', '2023-10-30', 0, '2023-09-26'),
(6, 'Novērtēt klienta atsauksmes', 'Analizēt klienta atsauksmes un izstrādāt uzlabojumu plānu', '2023-11-05', 0, '2023-09-26'),
(7, 'Sagatavot budžetu', 'Sagatavot nākamā gada budžeta priekšlikumu un apstiprināšanai iesniegt finanšu departamentam', '2023-11-10', 0, '2023-09-26'),
(8, 'Sastādīt darba grupas sēdes protokolu', 'Sastādīt protokolu par darba grupas sēdi un izsūtīt dalībniekiem', '2023-11-15', 1, '2023-09-26'),
(9, 'Pabeigt klienta projektu', 'Pabeigt klienta projektu un izsniegt gala ziņojumu', '2023-11-20', 0, '2023-09-26'),
(10, 'Izveidot jaunas produktu specifikācijas', 'Izstrādāt un apstiprināt jaunas produktu specifikācijas sadarbībā ar inženieriem', '2023-11-25', 0, '2023-09-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
