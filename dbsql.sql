-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 10:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'phpstore');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `aname` varchar(100) NOT NULL,
  `adesc` varchar(999) NOT NULL,
  `apicture` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `aname`, `adesc`, `apicture`, `created_at`) VALUES
(1, 'blog 1', '<p>Seamlessly orchestrate process-centric best practices with end-to-end catalysts for change. Proactively transform accurate internal or &ldquo;organic&rdquo; sources without team driven infomediaries. Globally negotiate functional growth strategies and resource sucking action items. Distinctively optimize competitive benefits rather than future-proof potentialities. Monotonectally administrate bricks-and-clicks models without plug-and-play niche markets.</p>\r\n\r\n<p>Credibly parallel task bleeding-edge processes via multidisciplinary mindshare. Enthusiastically reintermediate best-of-breed potentialities and next-generation internal or &ldquo;organic&rdquo; sources. Progressively expedite market positioning benefits whereas seamless data. Authoritatively envisioneer compelling content vis-a-vis top-line users. Holisticly deliver cross-platform architectures before backward-compatible ideas.</p>\r\n\r\n<p><img alt=\"\" src=\"https://picsum.photos/seed/picsum/200/300\" /></p>\r\n\r\n<p>Conveniently', '1lREW.jpg', '2021-01-22 13:23:00'),
(2, 'blog 2', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\"\" src=\"https://picsum.photos/id/237/200/300\" /></p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content her', '369334.jpg', '2021-01-22 13:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `picture`, `qty`, `total_price`, `email`) VALUES
(76, 'lemon tree', 400, 'ABT66DE284B3E0CA767DA2547D7E26A2A7C7836C931EDBC3723D2D01CA6D1E2DC76.jpg', 1, 400, 'ankit@gmail.com'),
(97, 'carrot', 40, 'ABTB927AAE8502559C1F063BE4DBDAA03376F3D46BA7318CBF0E2307E4693032903.jpg', 1, 40, 'ankit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cname`, `created_at`) VALUES
(1, 'vegetables', '2021-01-18 02:54:23'),
(2, 'tshirts', '2021-01-18 05:59:10'),
(3, 'electronics', '2021-01-19 09:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `msg` mediumtext NOT NULL,
  `cnumber` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `name`, `msg`, `cnumber`, `created_at`) VALUES
(1, 'as@gmail.com', 'abhishek', 'this is demo message', 1234567890, '2021-01-17 10:47:59'),
(4, 'as@gmail.com', 'vikash', 'hold', 1234567890, '2021-01-17 11:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` int(21) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `username`, `password`, `number`, `address`, `created_at`) VALUES
(1, 'ankit@gmail.com', 'ankit dada', 'ankit', 1234567890, 'veshnav dham dewas', '2021-01-21 03:41:24'),
(2, 'pankaj@gmail.com', 'pankaj', 'pankaj', 2147483647, 'samta nagr indore', '2021-01-21 06:17:01'),
(3, 'prince@gmail.com', 'prince noob', 'prince', 456213879, 'christian colony south avenue west indies', '2021-01-21 06:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(21) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pmode` varchar(20) NOT NULL,
  `products` varchar(250) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `email`, `number`, `address`, `pmode`, `products`, `grand_total`) VALUES
(5, 'prince noob', 'prince@gmail.com', 456213879, 'christian colony south avenue west indies', 'netbanking', 'carrot(2), lemon tree(1)', 480);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `pgallery` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `cname` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `pgallery`, `description`, `cname`, `created_at`) VALUES
(1, 'lemon tree', 400, 'ABT66DE284B3E0CA767DA2547D7E26A2A7C7836C931EDBC3723D2D01CA6D1E2DC76.jpg', '', 'this is good tshirt', 'tshirts', '2021-01-18 05:45:27'),
(2, 'carrot', 40, 'ABTB927AAE8502559C1F063BE4DBDAA03376F3D46BA7318CBF0E2307E4693032903.jpg', '', 'this is a fruitety fruits', 'vegetables', '2021-01-18 06:01:46'),
(3, 'TV', 5000, 'ABTD86114310C5236F0A4A31368F33E431EBFCC0CDE194AD876431C05C40F597EB8.jpg', '', 'tv is smart and ', 'electronics', '2021-01-19 10:00:23'),
(9, 'wah', 144, 'rozhok new stopage of enemy.png', 'a:3:{i:0;s:18:\"blue sky ocean.jpg\";i:1;s:17:\"evening field.jpg\";i:2;s:20:\"Screenshot (262).png\";}', 'this is lorem ipsum', 'tshirts', '2021-01-23 09:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `rating_review`
--

CREATE TABLE `rating_review` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` float NOT NULL,
  `review` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_review`
--

INSERT INTO `rating_review` (`id`, `prod_id`, `email`, `rating`, `review`, `created_at`) VALUES
(3, 1, 'ankit@gmail.com', 2.5, 'this is my sample review for this product', '2021-01-24 07:53:22'),
(4, 3, 'prince@gmail.com', 3, 'this is demo review', '2021-01-24 08:51:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
