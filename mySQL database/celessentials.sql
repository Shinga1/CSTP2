-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 04:39 PM
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
(1, 'Fenty Beauty Lipstick', 'fenty.jpg', 'The semi-matte, creamy formula hugs lips with a smooth, plush texture and long lasting iconic wear.', 20, 'Beauty', 10),
(2, 'Beats by Dr Dre', 'beats.jpg', 'Beats by Dr. Dre (Beats) is a leading audio brand founded in 2006 by Dr. Dre and Jimmy Iovine.', 350, 'Electronics', 10),
(3, 'Snoop Cereal by Snoop Dogg', 'snoop-loopz.jpg', 'This cereal is gluten-free, sugary, colorful, and full of marshmallows and produced by Broadus Foods, Snoops family-owned food product company.', 20, 'Food', 10),
(4, 'Dior Sauvage', 'sauvage.jpg', 'Sauvage Eau de Toilette, 60 ml. Fresh, citrusy and woody, the scent of this singular eau de toilette conveys the spirit of wide-open spaces.', 110, 'Perfumes', 10),
(5, 'David Beckham: My Side', 'beckham.jpg', 'This is David Beckham\'s own story of his career to date, for Manchester United, Real Madrid and England, and of his childhood, family and private life.', 10, 'Books', 5),
(6, 'Rare Beauty Under Eye Brightener', 'rare.jpg', 'A super lightweight liquid that instantly brightens, hydrates, and awakens undereyes with sheer to medium coverage for a fresh, radiant look in a flash.', 26, 'Beauty', 20),
(7, 'Rhode Glazing Fluid', 'rhode.jpg', 'Hailey’s signature step to dewy, glazed skin. A lightweight, quick-absorbing, gel serum that visibly plumps and hydrates to support a healthy skin barrier. Size: 50ml / 1.7oz.', 29, 'Beauty', 100),
(8, 'r.e.m lip liner pencil', 'rem.jpg', 'Create fuller looking lips with this highly pigment liner pencil that pairs perfectly with our matte liquid lipsticks and classic cream lipsticks. it’s formulated with next gen waxes with a creamy feel that glides onto lips. line, define—and watch ‘em line up.', 17, 'Beauty', 15),
(9, 'Haus Labs Atmic Shake Lip Laqcuer', 'gaga.jpg', 'Paint on high impact liquid lipstick with a transfer-proof, super glossy finish that lasts and lasts. No reapplying necessary.\r\n\r\nHausTech Powered™ with Marine Algae + Shine Boos', 27, 'Beauty', 30),
(10, 'Will (Hardback)', 'will.jpg', 'Tracing the incredible career of one of the biggest music and film stars of all time, Will Smith\'s inspirational memoir also homes in on the emotional toll that stardom can exact and provides sound advice to all those who think they have mastered life only to find themselves unfulfilled.', 20, 'Books', 20),
(11, 'Open Book (Hardcover )', 'Jessica.jpg', 'Jessica reveals for the first time her inner monologue and most intimate struggles. Guided by the journals she\'s kept since age fifteen, and brimming with her unique humour and down-to-earth humanity, Open Book is as inspiring as it is entertaining.', 17, 'Books', 20),
(12, 'Undisputed Truth: My Autobiography Paperback', 'tyson.jpg', 'One of the most talked-about and bestselling books of last year, this is the no-holds-barred autobiography of a sporting legend driven to the brink of self-destruction', 10, 'Books', 0),
(13, 'Unfinished (Hardcover)', 'chopra.jpg', 'The thoughtful, revealing and NEW YORK TIMES BESTSELLING memoir from one of the world\'s most recognisable women, renowned for her bold risk-taking and activism', 16, 'Books', 20),
(14, 'TRDR by Souija Boy', 'trdr.jpg', '“A disappointing handheld with little innovation, poor marketing and a bunch of problems”', 400, 'Electronics', 15),
(15, 'Will I Am Puls Smart Watch', 'puls.jpg', 'The i.am PULS (by Black Eyed Peas member and founder Will.i.am) is a smart cuff designed to replace your phone entirely. It features a 1.7-inch touchscreen display, which can be used to make calls, send texts, respond to emails, and more. ', 300, 'Electronics', 0),
(16, 'Virginia Black Whiskey by Drake', 'drake.jpg', 'Virginia Black Decadent American Whiskey. A collaboration between world renowned, platinum selling recording artist Drake and luxury spirits veteran Brent Hocking; the only three-time winner of the illustrious “Spirit of the Year” award.', 45, 'Food', 30),
(17, 'Aviation American Gin by Ryan Reynolds', 'ryan.jpg', 'Aviation Gin is a completely unique and distinguished gin from Portland, Oregon. Based on a ‘Botanical Democracy’ Aviation Gin has a balance of flavours rather than being dictated by juniper.', 25, 'Food', 20),
(18, 'Casamigos Blanco Tequila by George Clooney', 'clooney.jpg', 'Casamigos Blanco Tequila is a small batch, ultra-premium 100 Percent Blue Weber agave tequila founded by George Clooney and Rande Gerber', 52, 'Food', 50),
(19, 'Antonio Banderas Perfumes - The Secret - Eau ', 'antonio.jpg', 'Pure magnetism. The Secret by Antonio Banderas, a mysterious and magnetic men\'s fragrance that holds the true seducer\'s secret to success. A rich personality captured in a sensual, refined and extremely seductive fragrance', 23, 'Perfumes', 30),
(20, '818 Tequila Blanco by Kendall Jenner', 'kendall.jpg', 'Kendall Jenner has landed in the spirits business and we couldn\'t be more excited! 818 is the name of her tequila brand, named after the postcode of where she lives.', 65, 'Food', 30),
(21, 'Raycon The Everyday Earbuds by Ray J', 'ray.jpg', 'Small build, mighty sound. Our most compact wireless earbuds deliver crisp and powerful beats for your everyday grind.', 100, 'Electronics', 30),
(22, 'RiRi by Rihanna Eau de Parfum', 'riri.jpg', 'RiRi by Rihanna captures a fresh, vibrant essence with a playful twist.', 20, 'Perfumes', 30),
(23, 'Byredo Travx - Space Rage', 'travis.jpg', 'Travx - Space Rage is a limited perfume by Byredo for women and men and was released in 2020. The scent is sweet-fruity. ', 200, 'Perfumes', 1),
(24, 'Beyonce Midnight Heat', 'yonce.jpg', 'Midnight Heat perfume for women by Beyoncé is the ultimate evening scent; a tempting, sexy fragrance with a hint of mystery. The fruity floral gourmand opens with juicy top notes of Dragon fruit, Starfruit and Armenian Plum.', 25, 'Perfumes', 2),
(25, 'Limited Edition Pablo Escobar inspired iPhone', 'narcos.jpg', 'Pablo Escobar Mug Shot Phone Case', 10, 'Electronics', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
