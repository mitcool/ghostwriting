-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 03:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghostwriting`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_pages`
--

CREATE TABLE `about_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_de` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_de` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_de` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_pages`
--

INSERT INTO `about_pages` (`id`, `name`, `name_de`, `description_de`, `description`, `slug`, `slug_de`) VALUES
(1, 'Company', 'Unternehmen', 'lorem', 'lorem', 'company', 'unternehmen'),
(2, 'Know-how', 'Know-how', 'lorem', 'lorem', 'know-how', 'know-how'),
(3, 'Quality Assurance', 'Qualitätssicherung', 'lorem', 'lorem', 'quality-assurance', 'qualitaetssicherung'),
(4, 'PerFitS – Perfect Fit Solutions', 'PerFitS – Perfect Fit Solutions', 'lorem', 'lorem', 'perfect-fit-solutions', 'perfits'),
(5, 'Imprint', 'Impressum', 'asdfadsf', 'sasdfasdfadsf', 'imprint', 'impressum'),
(6, 'FAQ', 'FAQ', 'sfadsf', 'adsfads', 'faq', 'faq'),
(7, 'Data protection', 'Datenschutz', 'lorem', 'lorem', 'data-protection', 'datenschutz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_pages`
--
ALTER TABLE `about_pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_pages`
--
ALTER TABLE `about_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
