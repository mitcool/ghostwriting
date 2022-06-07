-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 02:27 PM
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
(1, '/services', '/services-de', 'services', 'services-de', 'HomeController@getServices', 0),
(2, '/service/{slug}', '/service-de/{slug}', 'service', 'service-de', 'HomeController@getService', 1),
(3, '/disciplines', '/disciplines-de', 'disciplines', 'disciplines-de', 'HomeController@getDisciplines', 0),
(4, '/discipline/{slug}', '/discipline-de/{slug}', 'discipline', 'discipline-de', 'HomeController@getDiscipline', 1),
(5, '/faq', '/faq-de', 'faq', 'faq-de', 'HomeController@getFaq', 0),
(6, '/about', '/about-de', 'about', 'about-de', 'HomeController@getAbout', 0),
(7, '/client/info', '/client-de/info-de', 'learn-more-client', 'learn-more-client-de', 'HomeController@learnMoreClient', 0),
(8, '/tutorials', '/tutorials-de', 'tutorial', 'tutorial-de', 'HomeController@getTutorials', 0),
(9, '/prices', '/prices-de', 'prices', 'prices-de', 'HomeController@getPrices', 0),
(10, '/agb', '/agb-de', 'agb', 'agb-de', 'HomeController@getAgb', 0),
(11, '/data-protection', '/data-protection-de', 'data-protection', 'data-protection-de', 'HomeController@getDataProtection', 0),
(12, '/imprint', '/imprint-de', 'imprint', 'imprint-de', 'HomeController@getImprint', 0),
(13, '/blog', '/blog-de', 'blog', 'blog-de', 'HomeController@getBlog', 0),
(14, '/blog/{slug}', '/blog-de/{slug}', 'single-blog', 'single-blog-de', 'HomeController@getSingleBlog', 1),
(15, '/order', '/order-de', 'order', 'order-de', 'HomeController@getOrder', 0),
(16, '/freelancer/application', '/freelancer-de/application', 'freelancer-application', 'freelancer-application-de', 'HomeController@getFreelancerApplication', 0),
(17, '/about/{slug}', '/about-de/{slug}', 'single-about', 'single-about-de', 'HomeController@getSingleAbout', 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
