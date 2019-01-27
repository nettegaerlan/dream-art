-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2019 at 11:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Drawing', 'drawing.jpg'),
(2, 'Writing', 'writing.jpg'),
(3, 'Paints & Brushes', 'paint.jpg'),
(4, 'Coloring Supplies', 'color.jpg'),
(5, 'Drawing Boards & Pads', 'board.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `description`, `image`, `category_id`) VALUES
(1, 'Derwent Academy Sketching Pencils 6', '174.00', '															Derwent Academy Sketching Pencils 6 Pack												', 'drawing-1.jpg', 1),
(2, 'Derwent Academy Sketching Pencils 12', '348.00', 'Derwent Academy Sketching Pencils 12 Pack', 'drawing-2.jpg', 1),
(3, 'Derwent Graphic Pencil Tin 6', '283.00', 'Derwent Graphic Pencil Tin 6 pieces', 'drawing-3.jpg', 1),
(4, 'Derwent Sketching Collection 24', '1739.00', 'Derwent Sketching Collection 24-pc set of Mixed Drawing', 'drawing-5.jpg', 1),
(5, 'Daler Rowney Simply Sketching 12', '348.00', 'Daler Rowney Simply Sketching Pencils Set 12 Pack', 'drawing-6.jpg', 1),
(6, 'Derwent Mechanical Pencil 0.5mm Set', '348.00', 'Derwent Mechanical Pencil 0.5mm Set', 'drawing-7.jpg', 1),
(7, 'Staedtler Noris HB Pencil 5 Pack', '237.00', '															Staedtler Noris HB Pencil 5 Pack											', 'drawing-8.jpg', 3),
(8, 'Faber-Castell Brush Pens 12', '349.00', 'Faber-Castell Brush Pens Set of 12', 'writing-1.jpg', 2),
(9, 'Kuretake Zig Brush Pens 12', '1299.75', 'Kuretake Zig Brush Pens Set of 12', 'writing-2.jpg', 2),
(10, 'Kuretake Zig Brush Pens 8', '849.75', 'Kuretake Zig Brush Pens Set of 8', 'writing-3.jpg', 2),
(11, 'Aquafine Watercoulor Brush Set 401', '1541.00', 'Aquafine Short-Handled Watercoulor Brush 4 Pack', 'brush-1.jpg', 3),
(12, 'Aquafine Watercoulor Brush Set 400', '907.00', 'Aquafine Short-Handled Watercoulor Brush 4 Pack', 'brush-2.jpg', 3),
(13, 'Acrylic Paint Set 12ml 12 Pack', '318.00', 'Acrylic Paint Set 12ml 12 Pack', 'paint-1.jpg', 3),
(14, 'Daler Rowney Graduate Acrylic Paint 120ml', '1813.00', 'Daler Rowney Graduate Acrylic Paint 120ml 9 Pack', 'paint-2.jpg', 3),
(15, 'Kids Brushes and Ready Mix Paint Bundle', '454.00', 'Kids Brushes and Ready Mix Paint Bundle', 'brush-3.jpg', 3),
(16, 'Derwent Inktense Block Tin', '1224.00', 'Derwent Inktense Block Tin', 'color-1.jpg', 4),
(17, 'Artist\'s Loft Watercolour Pencils Set', '635.00', 'Artist\'s Loft Watercolour Pencils Set 24 Pack', 'color-2.jpg', 4),
(18, 'Faber-Castell Watercolour Pencils', '2175.00', 'Faber-Castell Goldfaber Aqua Watercolour Pencils 24 Pack', 'color-3.jpg', 4),
(19, 'White Stretched Canvas 80cm x 60cm', '680.00', 'White Stretched Canvas 80cm x 60cm', 'board-1.jpg', 5),
(20, 'Turquoise Light Bulb Sketchbook', '272.00', 'Turquoise Light Bulb Sketchbook 20cm x 15cm', 'board-2.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `payment_mode_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `purchase_date` date NOT NULL,
  `transaction_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status_id`, `payment_mode_id`, `total`, `purchase_date`, `transaction_code`) VALUES
(3, 4, 3, 1, '174.00', '2019-01-27', '62339A-1548570627'),
(4, 4, 2, 1, '0.00', '2019-01-27', '884957-1548570746'),
(5, 4, 2, 1, '174.00', '2019-01-27', '3872E5-1548570757'),
(6, 4, 2, 1, '0.00', '2019-01-27', 'A26468-1548570876'),
(7, 4, 2, 1, '174.00', '2019-01-27', '31E155-1548570885'),
(8, 4, 2, 1, '174.00', '2019-01-27', '370E28-1548571207'),
(9, 4, 2, 1, '0.00', '2019-01-27', 'FB2A3E-1548571371'),
(10, 4, 2, 1, '174.00', '2019-01-27', '077780-1548571384'),
(11, 4, 2, 1, '349.00', '2019-01-27', 'FC7DBA-1548571798'),
(12, 4, 2, 1, '454.00', '2019-01-27', '72731C-1548571994'),
(13, 5, 2, 1, '523.00', '2019-01-27', '7624AE-1548572251'),
(14, 5, 2, 2, '349.00', '2019-01-27', 'DArt_5c4d572bcedc6'),
(15, 4, 2, 2, '454.00', '2019-01-27', 'DArt_5c4d57f5bbb9f'),
(16, 4, 2, 2, '174.00', '2019-01-27', 'DArt_5c4d5d243038d'),
(17, 4, 2, 1, '803.00', '2019-01-27', 'C91608-1548574042');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `item_id`, `quantity`) VALUES
(3, 3, 1, 1),
(4, 5, 1, 1),
(5, 7, 1, 1),
(6, 8, 1, 1),
(7, 10, 1, 1),
(8, 11, 8, 1),
(9, 12, 15, 1),
(10, 13, 1, 1),
(11, 13, 8, 1),
(12, 14, 8, 1),
(13, 15, 15, 1),
(14, 16, 1, 1),
(15, 17, 8, 1),
(16, 17, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`) VALUES
(1, 'COD'),
(2, 'PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'completed'),
(3, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `home_address`, `role_id`) VALUES
(2, '123admin', '$2y$10$oFX4shYTZGXG1jiQFIkVSuhLEoMBpjmPL4T05EI7jTJUYj17uqUAK', 'admin@', 'admin', 'admin', 'admin', 1),
(4, 'binette21', '$2y$10$mUV74TcQpPxnjte6VXvwJOE8RvwsxIP0qj7Y5V23Fd38H4N1mgTHy', 'bernette.games@gmail.com', 'Bernette', 'Gaerlan', 'Quezon City', 2),
(5, 'hpanganiban', '$2y$10$iO8VylrU6cep9C4aPzynR.sWs0l5bFip1HVly3J5372ioJC2nM4Km', 'panganiban.hannah@gmail.com', 'Hannah', 'Grace', 'QC', 2),
(6, 'art_admin', '$2y$10$lRgdK2SlX1laxTqTE0CaLuqcx1ELrntEOlAnVA3Fb5G1cNNnQeLte', 'art_admin@gmail.com', 'art_admin', 'art_admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `orders_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
