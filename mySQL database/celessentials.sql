-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 03:48 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celessentials`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Hasnain Ali', 'hasnain7815@gmail.com', 'sdsad', 'hh', '2023-03-11 13:49:19', '2023-03-11 13:49:19'),
(2, 'h', 'hasnain7815@gmail.com', 'h', 'h', '2023-03-11 14:11:14', '2023-03-11 14:11:14'),
(3, 'test', 'test@test.com', 'test', 'test', '2023-03-25 15:37:41', '2023-03-25 15:37:41'),
(4, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 15:39:50', '2023-03-25 15:39:50'),
(5, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 15:41:45', '2023-03-25 15:41:45'),
(6, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 15:44:40', '2023-03-25 15:44:40'),
(7, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 15:45:51', '2023-03-25 15:45:51'),
(8, 'test', 'test@gmail.com', 'test@gmail.com', 'test', '2023-03-25 15:51:17', '2023-03-25 15:51:17'),
(9, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 16:03:51', '2023-03-25 16:03:51'),
(10, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 16:06:47', '2023-03-25 16:06:47'),
(11, 'test', 'tester@gmail.com', 'test', 'tst', '2023-03-25 16:12:18', '2023-03-25 16:12:18'),
(12, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 16:18:03', '2023-03-25 16:18:03'),
(13, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 16:21:30', '2023-03-25 16:21:30'),
(14, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 16:33:50', '2023-03-25 16:33:50'),
(15, 'suu', 'suis@nn.com', 'susi', 'sdjsa', '2023-03-25 21:29:15', '2023-03-25 21:29:15'),
(16, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 22:01:53', '2023-03-25 22:01:53'),
(17, 'g', 'h@fdsfds.com', 'h@fdsfdsfdsf.com', 'h', '2023-03-25 22:04:42', '2023-03-25 22:04:42'),
(18, 'h', 'h@gmao.com', '11', '111', '2023-03-25 22:39:06', '2023-03-25 22:39:06'),
(19, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 22:49:26', '2023-03-25 22:49:26'),
(20, 'test', 'test@gmail.com', 'test', 'test', '2023-03-25 22:59:22', '2023-03-25 22:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2023_02_25_221725_create_basket_table', 2),
(27, '2023_02_28_151124_create_orders_table', 2),
(28, '2023_03_04_204435_create_orders_details_table', 2),
(29, '2023_03_10_214219_create_contact_table', 3),
(30, '2023_03_11_120638_create_contact_table', 4),
(31, '2023_03_11_154243_create_newsletter_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'hasnain@gmail.com', '2023-03-11 16:40:44', '2023-03-11 16:40:44'),
(2, 'h@gmail.com', '2023-03-11 16:47:48', '2023-03-11 16:47:48'),
(3, 'hasnain@gmai.com', '2023-03-27 10:17:05', '2023-03-27 10:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `subtotal`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Hasnain', 740.00, 'Processing', '2023-03-28 20:39:02', '2023-03-19 19:03:38'),
(2, '1', 'Hasnain', 2158.00, 'Shipping', '2023-03-26 23:00:00', '2023-03-18 19:01:17'),
(3, '1', 'Hasnain', 20.00, 'Delivered', '2023-03-26 21:26:20', '2023-03-18 19:15:16'),
(9, '3', 'hasnain', 110.00, 'Cancelled', '2023-03-25 19:14:47', '2023-03-18 19:15:21'),
(10, '3', 'hasnain', 350.00, 'Processing', '2023-03-24 22:27:33', '2023-03-18 19:41:20'),
(12, '1', 'Hasnain', 350.00, 'Processing', '2023-03-23 20:43:49', '2023-03-21 20:43:49'),
(13, '1', 'Hasnain', 550.00, 'Processing', '2023-03-22 20:44:36', '2023-03-21 20:44:36'),
(14, '1', 'Hasnain', 434.00, 'Shipping', '2023-03-21 00:00:00', '2023-03-23 22:20:11'),
(15, '1', 'Hasnain', 350.00, 'Shipping', '2023-03-21 00:00:00', '2023-03-23 21:28:13'),
(16, '1', 'Hasnain', 350.00, 'Processing', '2023-03-24 21:08:27', '2023-03-24 21:08:27'),
(17, '1', 'Hasnain', 440.00, 'Processing', '2023-03-24 21:15:15', '2023-03-24 21:15:15'),
(18, '1', 'Hasnain', 350.00, 'Processing', '2023-03-25 14:58:11', '2023-03-25 14:58:11'),
(19, '1', 'Hasnain', 20.00, 'Processing', '2023-03-26 15:32:51', '2023-03-26 15:32:51'),
(20, '1', 'Hasnain', 20.00, 'Processing', '2023-03-27 10:16:15', '2023-03-27 10:16:15'),
(21, '1', 'Hasnain', 20.00, 'Processing', '2023-03-28 14:19:12', '2023-03-28 14:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `quantity`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 2, 40.00, '2023-03-05 21:39:02', '2023-03-05 21:39:02'),
(2, '1', 2, 2, 700.00, '2023-03-05 21:39:02', '2023-03-05 21:39:02'),
(3, '2', 2, 5, 1750.00, '2023-03-06 11:29:23', '2023-03-06 11:29:23'),
(4, '2', 4, 3, 330.00, '2023-03-06 11:29:23', '2023-03-06 11:29:23'),
(5, '2', 6, 3, 78.00, '2023-03-06 11:29:23', '2023-03-06 11:29:23'),
(6, '3', 1, 1, 20.00, '2023-03-07 21:25:29', '2023-03-07 21:25:29'),
(7, '6', 3, 1, 20.00, '2023-03-07 21:26:03', '2023-03-07 21:26:03'),
(8, '8', 2, 3, 1050.00, '2023-03-09 22:19:24', '2023-03-09 22:19:24'),
(9, '9', 4, 1, 110.00, '2023-03-18 19:14:47', '2023-03-18 19:14:47'),
(10, '10', 2, 1, 350.00, '2023-03-18 19:38:22', '2023-03-18 19:38:22'),
(11, '11', 2, 1, 350.00, '2023-03-21 20:25:56', '2023-03-21 20:25:56'),
(12, '12', 2, 1, 350.00, '2023-03-21 20:43:49', '2023-03-21 20:43:49'),
(13, '13', 4, 5, 550.00, '2023-03-21 20:44:36', '2023-03-21 20:44:36'),
(14, '14', 8, 2, 34.00, '2023-03-21 21:03:40', '2023-03-21 21:03:40'),
(15, '14', 14, 1, 400.00, '2023-03-21 21:03:40', '2023-03-21 21:03:40'),
(16, '15', 2, 1, 350.00, '2023-03-21 22:41:23', '2023-03-21 22:41:23'),
(17, '16', 2, 1, 350.00, '2023-03-24 21:08:27', '2023-03-24 21:08:27'),
(18, '17', 4, 4, 440.00, '2023-03-24 21:15:15', '2023-03-24 21:15:15'),
(19, '18', 2, 1, 350.00, '2023-03-25 14:58:11', '2023-03-25 14:58:11'),
(20, '19', 3, 1, 20.00, '2023-03-26 15:32:51', '2023-03-26 15:32:51'),
(21, '20', 3, 1, 20.00, '2023-03-27 10:16:15', '2023-03-27 10:16:15'),
(22, '21', 3, 1, 20.00, '2023-03-28 14:19:12', '2023-03-28 14:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_image` text NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_price` float NOT NULL,
  `product_category` varchar(45) NOT NULL,
  `product_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_description`, `product_price`, `product_category`, `product_stock`) VALUES
(1, 'Fenty Beauty Lipstick', 'fenty.jpg', 'The semi-matte, creamy formula hugs lips with a smooth, plush texture and long lasting iconic wear.', 20, 'Beauty', 5),
(2, 'Beats by Dr Dre', 'beats.jpg', 'Beats by Dr. Dre (Beats) is a leading audio brand founded in 2006 by Dr. Dre and Jimmy Iovine.', 350, 'Electronics', 0),
(3, 'Snoop Cereal by Snoop Dogg', 'snoop-loopz.jpg', 'This cereal is gluten-free, sugary, colorful, and full of marshmallows and produced by Broadus Foods, Snoops family-owned food product company.', 20, 'Food', 2),
(4, 'Dior Sauvage', 'sauvage.jpg', 'Sauvage Eau de Toilette, 60 ml. Fresh, citrusy and woody, the scent of this singular eau de toilette conveys the spirit of wide-open spaces.', 110, 'Perfumes', 1),
(5, 'David Beckham: ', 'beckham.jpg', 'This is David Beckham\'s own story of his career to date, for Manchester United, Real Madrid and England, and of his childhood, family and private life.', 10, 'Books', 0),
(6, 'Rare Beauty Under Eye Brightener', 'rare.jpg', 'A super lightweight liquid that instantly brightens, hydrates, and awakens undereyes with sheer to medium coverage for a fresh, radiant look in a flash.', 26, 'Beauty', 0),
(7, 'Rhode Glazing Fluid', 'rhode.jpg', 'Hailey’s signature step to dewy, glazed skin. A lightweight, quick-absorbing, gel serum that visibly plumps and hydrates to support a healthy skin barrier. Size: 50ml / 1.7oz.', 29, 'Beauty', 10),
(8, 'r.e.m lip liner pencil', 'rem.jpg', 'Create fuller looking lips with this highly pigment liner pencil that pairs perfectly with our matte liquid lipsticks and classic cream lipsticks. it’s formulated with next gen waxes with a creamy feel that glides onto lips. line, define—and watch ‘em line up.', 17, 'Beauty', 8),
(9, 'Haus Labs Atmic Shake Lip Laqcuer', 'gaga.jpg', 'Paint on high impact liquid lipstick with a transfer-proof, super glossy finish that lasts and lasts. No reapplying necessary.\r\n\r\nHausTech Powered™ with Marine Algae + Shine Boos', 27, 'Beauty', 26),
(10, 'Will (Hardback)', 'will.jpg', 'Tracing the incredible career of one of the biggest music and film stars of all time, Will Smith\'s inspirational memoir also homes in on the emotional toll that stardom can exact and provides sound advice to all those who think they have mastered life only to find themselves unfulfilled.', 20, 'Books', 17),
(11, 'Open Book (Hardcover )', 'Jessica.jpg', 'Jessica reveals for the first time her inner monologue and most intimate struggles. Guided by the journals she\'s kept since age fifteen, and brimming with her unique humour and down-to-earth humanity, Open Book is as inspiring as it is entertaining.', 17, 'Books', 20),
(12, 'Undisputed Truth: My Autobiography Paperback', 'tyson.jpg', 'One of the most talked-about and bestselling books of last year, this is the no-holds-barred autobiography of a sporting legend driven to the brink of self-destruction', 10, 'Books', 10),
(13, 'Unfinished (Hardcover)', 'chopra.jpg', 'The thoughtful, revealing and NEW YORK TIMES BESTSELLING memoir from one of the world\'s most recognisable women, renowned for her bold risk-taking and activism', 16, 'Books', 19),
(14, 'TRDR by Souija Boy', 'trdr.jpg', '“A disappointing handheld with little innovation, poor marketing and a bunch of problems”', 400, 'Electronics', 14),
(15, 'Will I Am Puls Smart Watch', 'puls.jpg', 'The i.am PULS (by Black Eyed Peas member and founder Will.i.am) is a smart cuff designed to replace your phone entirely. It features a 1.7-inch touchscreen display, which can be used to make calls, send texts, respond to emails, and more. ', 300, 'Electronics', 10),
(16, 'Virginia Black Whiskey by Drake', 'drake.jpg', 'Virginia Black Decadent American Whiskey. A collaboration between world renowned, platinum selling recording artist Drake and luxury spirits veteran Brent Hocking; the only three-time winner of the illustrious “Spirit of the Year” award.', 45, 'Food', 30),
(17, 'Aviation American Gin by Ryan Reynolds', 'ryan.jpg', 'Aviation Gin is a completely unique and distinguished gin from Portland, Oregon. Based on a ‘Botanical Democracy’ Aviation Gin has a balance of flavours rather than being dictated by juniper.', 25, 'Food', 20),
(18, 'Casamigos Blanco Tequila by George Clooney', 'clooney.jpg', 'Casamigos Blanco Tequila is a small batch, ultra-premium 100 Percent Blue Weber agave tequila founded by George Clooney and Rande Gerber', 52, 'Food', 49),
(19, 'Antonio Banderas Perfumes - The Secret - Eau ', 'antonio.jpg', 'Pure magnetism. The Secret by Antonio Banderas, a mysterious and magnetic men\'s fragrance that holds the true seducer\'s secret to success. A rich personality captured in a sensual, refined and extremely seductive fragrance', 23, 'Perfumes', 30),
(20, '818 Tequila Blanco by Kendall Jenner', 'kendall.jpg', 'Kendall Jenner has landed in the spirits business and we couldn\'t be more excited! 818 is the name of her tequila brand, named after the postcode of where she lives.', 65, 'Food', 30),
(21, 'Raycon The Everyday Earbuds by Ray J', 'ray.jpg', 'Small build, mighty sound. Our most compact wireless earbuds deliver crisp and powerful beats for your everyday grind.', 100, 'Electronics', 30),
(22, 'RiRi by Rihanna Eau de Parfum', 'riri.jpg', 'RiRi by Rihanna captures a fresh, vibrant essence with a playful twist.', 20, 'Perfumes', 30),
(23, 'Byredo Travx - Space Rage', 'travis.jpg', 'Travx - Space Rage is a limited perfume by Byredo for women and men and was released in 2020. The scent is sweet-fruity. ', 200, 'Perfumes', 11),
(24, 'Beyonce Midnight Heat', 'yonce.jpg', 'Midnight Heat perfume for women by Beyoncé is the ultimate evening scent; a tempting, sexy fragrance with a hint of mystery. The fruity floral gourmand opens with juicy top notes of Dragon fruit, Starfruit and Armenian Plum.', 25, 'Perfumes', 210),
(25, 'Limited Edition Pablo Escobar inspired iPhone', 'narcos.jpg', 'Pablo Escobar Mug Shot Phone Case', 10, 'Electronics', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hasnain', 'hasnain@gmail.com', NULL, '$2y$10$aWMzIHujPRJzIFdx.BiRV.Wnu//N4YstC1lof2PH2f.NRqcnE5jTW', NULL, '2023-03-05 16:52:33', '2023-03-05 16:52:33'),
(2, 'test', 'test123@test.com', NULL, '$2y$10$NzLDxP6cYV5.SA6vM4bBwe8DfuXfyU0UCbsQIADg19PEpRx9KC1XK', NULL, '2023-03-05 21:18:27', '2023-03-05 21:18:27'),
(3, 'hasnain', 'lol@lol.com', NULL, '$2y$10$aEuXSRG4We8.XCEzqLGCU.znHBSjv9iD9/lENE2VrAG2XIwrATLN6', NULL, '2023-03-18 19:14:04', '2023-03-18 19:14:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_email_unique` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKs0r9x49croribb4j6tah648gt` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `FKs0r9x49croribb4j6tah648gt` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
