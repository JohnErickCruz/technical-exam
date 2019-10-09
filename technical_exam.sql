-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 07:50 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technical_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `comment`, `created_at`) VALUES
(3, 9, 'sample sample', '2019-09-17 07:06:41'),
(6, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rutrum faucibus aliquam. Vestibulum fringilla justo ut enim consequat, ut tempor sapien faucibus. ', '2019-09-17 09:48:34'),
(8, 13, 'sasasas', '2019-09-18 07:59:02'),
(11, 16, 'saASasA', '2019-09-18 14:18:24'),
(12, 19, 'asdasdasdasd', '2019-10-02 09:16:26'),
(13, 0, '', '2019-10-06 02:32:29'),
(14, 0, '', '2019-10-06 02:37:05'),
(15, 0, 'sasasasasa', '2019-10-06 02:42:43'),
(19, 36, 'sample comment', '2019-10-06 14:00:13'),
(23, 36, 'aaaaaa', '2019-10-06 14:05:39'),
(24, 36, 'eeeeeeeee', '2019-10-06 14:07:36'),
(41, 10, 'TEST', '2019-10-07 05:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`) VALUES
(5, 'Title News 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rutrum faucibus aliquam. Vestibulum fringilla justo ut enim consequat, ut tempor sapien faucibus. Morbi venenatis iaculis felis ac tincidunt. Duis sit amet felis porta, efficitur orci a, fermentum mauris. Quisque phare', '2019-10-07 05:44:13'),
(6, 'Title News 3', 'Sed feugiat porttitor turpis. Phasellus accumsan porttitor dictum. Suspendisse tempor eros eu cursus lobortis. Donec aliquet sem ac sollicitudin convallis. Maecenas neque leo, ', '2019-10-07 05:43:57'),
(7, 'Title News 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rutrum faucibus aliquam. Vestibulum fringilla justo ut enim consequat, ut tempor sapien faucibus. Morbi venenatis iaculis felis ac tincidunt. Duis sit amet felis porta, efficitur orci a, fermentum mauris. Quisque phare', '2019-10-07 05:43:51'),
(9, 'Title News 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rutrum faucibus aliquam. Vestibulum fringilla justo ut enim consequat, ut tempor sapien faucibus. Morbi venenatis iaculis felis ac tincidunt. Duis sit amet felis porta, efficitur orci a, fermentum mauris. Quisque phare', '2019-10-07 05:43:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
