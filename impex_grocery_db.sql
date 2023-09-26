-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 07:36 PM
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
-- Database: `impex_grocery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_num` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fullname`, `email`, `password`, `mobile_num`, `created_at`) VALUES
(2, 'Bibek Thapa', 'bibekthapa@gmail.com', '$2y$10$o9OBpWfgolwfktdsVXGWo.XxP.vqXgkKg9ioZF.XgBzA/Xr/XjrRK', '9818769123', '2023-09-13 13:24:37'),
(3, 'Rajin Sakha', 'rajinsakha07@gmail.com', '$2y$10$/SOU/HlMv772Db4JyzTQ5ODrOt2j3d7TgHPDijDagcGAndOlYb7eG', '9761626067', '2023-09-13 21:59:27'),
(5, 'Sagar Thapa Magar', 'sagarthapamagar@gmail.com', '$2y$10$PTGbGgD2pOCsJDMkI/yx2u/eRlcvbwNhgHJWr8o6nki6De9sH8aPC', '9816446448', '2023-09-14 21:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `quantity`, `customer_id`) VALUES
(103, 36, 9, 34);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_num` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `fullname`, `email`, `password`, `mobile_num`, `created_at`) VALUES
(34, 'Samar Gautam', 'samargautam@gmail.com', '$2y$10$y8PTsXnks8Ii356RBD8pE.1kfHi95yo39vF/TIHNMtjBInzawL6Ma', '9841621890', '2023-09-12 20:02:47'),
(43, 'Ganesh Rapal', 'ganeshrapal@gmail.com', '$2y$10$cLQgDrWWNsSA6FBihLJGxuWRDvwQxYCFFbLyO/iMpezfmDeD5Z/b6', '9846889763', '2023-09-15 14:56:47'),
(44, 'Joyeb Jung Shrestha', 'jungjoyeb@gmail.com', '$2y$10$iqFxFHIuFJ.toX5TYEOYn.PgTGU/msFyzpHlwCLAK8ZYOnJt6VA0K', '9818769105', '2023-09-15 18:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `fullname`, `email`, `message`, `message_date`) VALUES
(1, 'Samar Gautam', 'samargautam@gmail.com', 'Hello!', '2023-09-12'),
(7, 'Samir Wagle', 'samirwagle@gmail.com', 'Can I know about the delivery charge while ordering products?', '2023-09-15'),
(8, 'Suresh Saud', 'saudsuresh@gmail.com', 'How can I return the product if I received the damaged or wrong product?', '2023-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `total_price`, `product_name`, `customer_name`, `email`, `address`, `payment`, `status`, `order_date`) VALUES
(313, 34, 40, 1200, 'Doritos Chips Pack of 4', 'Samar Gautam', 'samargautam@gmail.com', 'Nakhipot,Lalitpur', 'COD', 'Ready for Delivery', '2023-09-13 23:55:15'),
(315, 43, 51, 690, 'Rosewater Gundpak 1 Box', 'Ganesh Rapal', 'ganeshrapal@gmail.com', 'Chapagaun,Lalitpur', 'COD', 'Pending', '2023-09-15 14:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `img_main` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `img4` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category`, `price`, `quantity`, `img_main`, `img2`, `img3`, `img4`, `description`, `created_at`, `admin_id`) VALUES
(38, 'Oatmeal Cookies 1 Box', 'SNACKS', 600, 10, 'oatmeal-cookies.jpg', 'oatmeal-cookies-2.jpg', 'oatmeal-cookies-3.jpg', 'oatmeal-cookies-4.jpg', 'Handcrafted oatmeal cookies with Pumpkin seeds, Cranberry and an infusion of Gundpak.', '2023-08-21 08:53:31', 2),
(40, 'Doritos Chips Pack of 4', 'SNACKS', 200, 10, 'Doritos.jpg', 'doritos-blue.jpg', 'doritos-dark.jpg', 'dortios-red.jpg', 'Doritos chips are a popular brand of flavored tortilla chips produced by Frito-Lay. They come in a variety of flavors and are known for their distinctive triangular shape and bold, intense taste.', '2023-08-21 13:51:34', 2),
(41, 'Makkuse GundPak 1 Box', 'SWEETS', 800, 10, 'regular-gundpak.jpeg', 'rosewater-gundpak.jpg', 'sugarfreee-gundpak.jpg', 'miocha-gundpak.jpg', 'The original taste of Khuwa churned and hobbled in with a hug of Gund, this Gundpak is set to please your nostalgia. Regular Gundpak is available in a single jar and combos. Enjoy this gundpak with your loved ones.', '2023-08-21 14:15:42', 2),
(46, 'Apples 1 KG', 'FRUITS', 340, 10, 'apple.jpg', 'applee1.jpg', 'applee2.jpg', 'applee3.jpg', 'Enjoy sweetest apples from Jumla.', '2023-09-13 17:49:46', 3),
(47, 'Regular Pustakari 1 Box', 'SWEETS', 550, 5, 'regular-pustakari.jpg', 'pusta1.jpg', 'pusta2.jpg', 'pusta3.jpg', 'Delicious hard candies that will take you back in time, reminiscing days of Nepal recent but never forgotten authentic delicious history. The small box has around 30 candies and the large box contains around 50 Pieces of this premium candy.', '2023-09-14 16:20:10', 5),
(48, 'Chocolate Cookies 1 Box', 'SNACKS', 700, 5, 'chocolate-cookies.jpg', 'oatmeal-cookies-3.jpg', 'oatmeal-cookies-4.jpg', 'oatmeal-cookies-2.jpg', 'Handcrafted dark chocolate fudge cookies filled with the saccharine taste of Gundpak.', '2023-09-14 16:22:55', 5),
(49, 'Mangoes 1 KG', 'FRUITS', 200, 10, 'mango.jpg', 'mango001.jpg', 'mango002.jpg', 'mango004.jpg', 'Enjoy these fresh, delicious and tasties mangoes from Terai region of Nepal.', '2023-09-14 16:27:35', 5),
(50, 'Watermelon 1KG', 'FRUITS', 250, 10, 'watermelon.jpg', 'water.png', 'water1.png', 'water2.png', 'Dive into the refreshing taste of summer with our premium watermelon! Grown under optimal conditions to ensure ripeness and flavor, this juicy fruit promises a burst of sweetness with every bite.', '2023-09-14 17:44:03', 3),
(51, 'Rosewater Gundpak 1 Box', 'SWEETS', 690, 10, 'rosewater-gundpak.jpg', 'sugarfreee-gundpak.jpg', 'regular-gundpak.jpeg', 'miocha-gundpak.jpg', 'A play with the authentic Gundpak recipe, our Gundpaks have the wholesome taste of nostalgia. This is a traditional gundpak infused with modern touch of rosewater and garnished with pistachio.', '2023-09-14 17:46:16', 3);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `shipping_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_num` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`shipping_id`, `fullname`, `email`, `mobile_num`, `address`, `zip`, `customer_id`) VALUES
(55, 'Samar Gautam', 'samargautam@gmail.com', 2147483647, 'Nakhipot,Lalitpur', '44800', 34),
(56, 'Ganesh Rapal', 'ganeshrapal@gmail.com', 2147483647, 'Chapagaun,Lalitpur', '44500', 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_ibfk_1` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`customer_id`),
  ADD KEY `orders_ibfk_2` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`admin_id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `shipping_details_ibfk_1` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
