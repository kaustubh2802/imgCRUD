-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2024 at 07:25 AM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imgcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `username`, `password`, `email`, `photo`) VALUES
(5, 'ee', 'ee', 'ee@gmail.com', 'yt1.png'),
(6, 'ff', 'ff', 'ff@gmail.com', 'twitter.png'),
(7, 'gg', 'gg', 'gg@gmail.com', 'xbox.png'),
(8, 'hh', 'hh', 'hh@gmail.com', 'i.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `prod_image` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `prod_image`, `created_at`) VALUES
(1, 'Acer Nitro V Gaming ', 'Intel Core i5-13420H with RTX 4050 Graphics 6GB VRAM, 144Hz Display (16GB DDR5/512GB SSD/Windows 11 Home/Wi-Fi 6),15.6\"(39.6cms) FHD ANV15-51', '74,990', '1727703710.jpg', '2024-09-30 13:41:50'),
(2, 'amazon basics Laptop', 'Water Repellent and Wear Resistant, Melange Slub Grey', '599', '1727703930bag.jpg', '2024-09-30 13:45:30'),
(3, 'aa', 'vv', '22', '1727704121bag.jpg', '2024-09-30 13:48:41'),
(4, 'aa', 'bb', '55', '1729167290p1.jpg', '2024-10-17 12:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `photo`) VALUES
(18, 'aa', 'aa@gmail.com', 'a.png'),
(6, 'dfd', 'asdf@gmail.com', 'default.jpg'),
(7, 'dd', 'dd@gmail.com', 'default.jpg'),
(8, 'dd', 'dd@gmalil.cc', 'yt.png'),
(9, 'dd', 'dd@dd.dd', 'adidas.png'),
(12, 'fadfksd', 'kk@gmal.cc', 'iconChat1.png'),
(13, 'fasdf', 'ad@ff.ff', 'instgram1.png'),
(14, 'asff', 'll@ss.ss', 'adobe.png'),
(15, 'sssssssssssssss', 'jj@dd.ss', 'img1.jpg'),
(16, 'ss', 'kk@kk.kk', 'instgram2.png'),
(17, 'pp', 'oo@gmil.co', 'istockphoto-1254534205-612x612.jpg'),
(19, 'zz', 'zz@zz.zz', 'adidas2.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `picture`, `created`, `modified`, `status`) VALUES
(1, 'aabb', 'aa@gmail.com', 'aa', 'zzzzzzzzzzzzzzzzzzzzzzzzz', 'microsoft1.png', '2024-10-21 04:22:19', '2024-10-21 04:22:19', 0),
(2, 'cc', 'cc@gmail.com', 'cc', 'cccccccccc', 'microsoft2.png', '2024-10-21 04:22:33', '2024-10-21 04:22:33', 1),
(3, 'aabb', 'aa@gmail.com', 'aa', 'aa', 'adidas.png', '2024-10-21 04:25:17', '2024-10-21 04:25:17', 0),
(5, 'aa', 'aa@ff.aa', 'kk', 'ddd', 'chat.png', '2024-10-21 05:11:48', '2024-10-21 05:11:48', 0),
(7, 'aa', 'aa', 'aa', 'aa', 'yt.png', '2024-10-21 06:03:12', '2024-10-21 06:03:12', 1),
(9, 'aa', 'bb', 'bbd', 'dddddd', 'adidas1.png', '2024-10-21 06:06:02', '2024-10-21 06:06:02', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
