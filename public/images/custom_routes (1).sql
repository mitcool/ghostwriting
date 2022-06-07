-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 03:24 PM
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
-- Table structure for table `custom_routes`
--

CREATE TABLE `custom_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_de` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_de` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_routes`
--

INSERT INTO `custom_routes` (`id`, `url_en`, `url_de`, `name_en`, `name_de`, `action`, `slug`) VALUES
(1, '/ghostwriters', '/ghostwriter', 'services', 'services-de', 'HomeController@getServices', 0),
(2, '/ghostwriters/{slug}', '/ghostwriter/{slug}', 'service', 'service-de', 'HomeController@getService', 1),
(3, '/writing-services', '/disziplinen', 'disciplines', 'disciplines-de', 'HomeController@getDisciplines', 0),
(4, '/writing-services/{slug}', '/disziplinen/{slug}', 'discipline', 'discipline-de', 'HomeController@getDiscipline', 1),
(6, '/about', '/ueber-uns', 'about', 'about-de', 'HomeController@getAbout', 0),
(7, '/client/info', '/client-de/info-de', 'learn-more-client', 'learn-more-client-de', 'HomeController@learnMoreClient', 0),
(8, '/tutorials', '/tutorials', 'tutorial', 'tutorial-de', 'HomeController@getTutorials', 0),
(9, '/prices', '/preise', 'prices', 'prices-de', 'HomeController@getPrices', 0),
(13, '/blog', '/blog', 'blog', 'blog-de', 'HomeController@getBlog', 0),
(14, '/blog/{slug}', '/blog/{slug}', 'single-blog', 'single-blog-de', 'HomeController@getSingleBlog', 1),
(15, '/about/start-project-request', '/ueber-uns/projektanfrage-starten', 'order', 'order-de', 'HomeController@getOrder', 0),
(16, '/about/freelancer/application', '/ueber-uns/bewerbung-als-autor', 'freelancer-application', 'freelancer-application-de', 'HomeController@getFreelancerApplication', 0),
(17, '/about/{slug}', '/ueber-uns/{slug}', 'single-about', 'single-about-de', 'HomeController@getSingleAbout', 1),
(18, '/tutorials/{slug}', '/tutorials/{slug}', 'single-tutorial', 'single-tutorial-de', 'HomeController@getSingleTutorial', 1),
(19, '/', '/', 'welcome-en', 'welcome-de', 'HomeController@getHome', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_routes`
--
ALTER TABLE `custom_routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_routes`
--
ALTER TABLE `custom_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
