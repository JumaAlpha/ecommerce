-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 10:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin_user', 'admin_password');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `added_on`) VALUES
(18, 7, 1, 1, '2024-11-27 08:59:29'),
(19, 7, 2, 1, '2024-11-27 09:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `phone`, `email`, `license_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '123-456-7890', 'john.doe@example.com', 'D123456', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(2, 'Jane Smith', '098-765-4321', 'jane.smith@example.com', 'D654321', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(3, 'Mike Johnson', '555-123-4567', 'mike.johnson@example.com', 'D987654', 'Inactive', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(4, 'Emily Davis', '321-654-0987', 'emily.davis@example.com', 'D135792', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(5, 'David Brown', '456-789-1234', 'david.brown@example.com', 'D246801', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(6, 'Sarah Wilson', '789-123-4560', 'sarah.wilson@example.com', 'D987123', 'Inactive', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(7, 'Chris Evans', '234-567-8901', 'chris.evans@example.com', 'D314159', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(8, 'Anna Taylor', '654-321-0987', 'anna.taylor@example.com', 'D271828', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(9, 'Peter Parker', '111-222-3333', 'peter.parker@example.com', 'D161803', 'Inactive', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(10, 'Bruce Wayne', '444-555-6666', 'bruce.wayne@example.com', 'D123123', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(11, 'John Doe', '123-456-7890', 'john.doe@example.com', 'D123456', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(12, 'Jane Smith', '098-765-4321', 'jane.smith@example.com', 'D654321', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(13, 'Mike Johnson', '555-123-4567', 'mike.johnson@example.com', 'D987654', 'Inactive', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(14, 'Emily Davis', '321-654-0987', 'emily.davis@example.com', 'D135792', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(15, 'David Brown', '456-789-1234', 'david.brown@example.com', 'D246801', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(16, 'Sarah Wilson', '789-123-4560', 'sarah.wilson@example.com', 'D987123', 'Inactive', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(17, 'Chris Evans', '234-567-8901', 'chris.evans@example.com', 'D314159', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(18, 'Anna Taylor', '654-321-0987', 'anna.taylor@example.com', 'D271828', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(19, 'Peter Parker', '111-222-3333', 'peter.parker@example.com', 'D161803', 'Inactive', '2024-10-14 08:46:06', '2024-10-14 08:46:06'),
(20, 'Bruce Wayne', '444-555-6666', 'bruce.wayne@example.com', 'D123123', 'Active', '2024-10-14 08:46:06', '2024-10-14 08:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `shipping_address` text NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `username`, `product_name`, `quantity`, `total_price`, `shipping_address`, `status`, `created_at`) VALUES
(1, 2, '', 'Laptop', 4, 255000.00, 'Nairobi Kenya', 'Pending', '2024-11-08 01:23:53'),
(2, 2, '', 'Office Chair', 1, 255000.00, 'Nairobi Kenya', 'Pending', '2024-11-08 01:23:53'),
(3, 2, 'user', 'Office Chair', 2, 30000.00, 'Kenya', 'Pending', '2024-11-08 01:32:19'),
(4, 3, 'Jaby', 'Laptop', 1, 75000.00, 'Karatina, Nairobi', 'Pending', '2024-11-08 01:41:26'),
(5, 3, 'Jaby', 'Office Chair', 1, 75000.00, 'Karatina, Nairobi', 'Pending', '2024-11-08 01:41:26'),
(6, 4, 'Jaby it_sltns', 'Switch', 1, 2000.00, 'THIKA', 'Pending', '2024-11-13 19:09:44'),
(7, 5, 'Elvis', 'Office Chair', 1, 75000.00, 'Nairobi CBD', 'Pending', '2024-11-21 06:12:57'),
(8, 5, 'Elvis', 'Laptop', 1, 75000.00, 'Nairobi CBD', 'Pending', '2024-11-21 06:12:57'),
(9, 5, 'Elvis', 'Office Chair', 2, 456450.00, 'Ruiru', 'Pending', '2024-11-21 06:16:29'),
(10, 5, 'Elvis', 'Switch', 1, 456450.00, 'Ruiru', 'Pending', '2024-11-21 06:16:29'),
(11, 5, 'Elvis', 'Monitor', 1, 456450.00, 'Ruiru', 'Pending', '2024-11-21 06:16:29'),
(12, 5, 'Elvis', 'Monitor', 2, 456450.00, 'Ruiru', 'Pending', '2024-11-21 06:16:29'),
(13, 5, 'Elvis', 'RAM', 2, 456450.00, 'Ruiru', 'Pending', '2024-11-21 06:16:29'),
(14, 5, 'Elvis', 'Laptop', 7, 456450.00, 'Ruiru', 'Pending', '2024-11-21 06:16:29'),
(15, 5, 'Elvis', 'Office Chair', 2, 30000.00, 'Kisumu', 'Pending', '2024-11-26 13:14:01'),
(16, 6, 'Myself', 'Laptop', 1, 60000.00, 'kisii', 'Pending', '2024-11-26 13:37:47'),
(17, 7, 'Abros', 'IT Consultancy', 1, 100.00, 'Kariokoo', 'Pending', '2024-11-27 08:19:31'),
(18, 9, 'online', 'Office Chair', 1, 15000.00, 'kakamega', 'Pending', '2024-11-27 09:55:02'),
(19, 9, 'online', 'Laptop', 2, 150180.00, 'Juja', 'Pending', '2024-11-27 12:03:15'),
(20, 9, 'online', 'Office Chair', 2, 150180.00, 'Juja', 'Pending', '2024-11-27 12:03:15'),
(21, 9, 'online', 'Monitor', 1, 150180.00, 'Juja', 'Pending', '2024-11-27 12:03:15'),
(22, 9, 'online', 'SSD', 2, 150180.00, 'Juja', 'Pending', '2024-11-27 12:03:15'),
(23, 5, 'Elvis', 'Laptop', 2, 165000.00, 'Nyeri', 'Pending', '2024-11-27 12:10:16'),
(24, 5, 'Elvis', 'Office Chair', 3, 165000.00, 'Nyeri', 'Pending', '2024-11-27 12:10:16'),
(25, 5, 'Elvis', 'IT Consultancy', 1, 100.00, 'Jomoko', 'Pending', '2024-11-27 12:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `model`, `price`, `description`, `image_url`) VALUES
(1, 'Laptop', 'HP ProBook', 60000, 'A high-performance laptop for professionals', NULL),
(2, 'Office Chair', 'ErgoChair', 15000, 'Ergonomic office chair with lumbar support', NULL),
(3, 'Switch', 'TP-Link', 2000, 'Reliable network switch for small businesses', NULL),
(4, 'RAM', 'Samsung', 2000, '8GB Brand New Samsung RAM', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEABsbGxscGx4hIR4qLSgtKj04MzM4PV1CR0JHQl2NWGdYWGdYjX2Xe3N7l33gsJycsOD/2c7Z//////////////8BGxsbGxwbHiEhHiotKC0qPTgzMzg9XUJHQkdCXY1YZ1hYZ1iNfZd7c3uXfeCwnJyw4P/Zztn////////////////CABEIAPoA+gMBIgACEQEDEQH/'),
(5, 'Monitor', 'Dell', 150, 'Easy to user and affordable', 'https://www.google.com/imgres?q=monitor&imgurl=https%3A%2F%2Fwww.hp.com%2Fcontent%2Fdam%2Fsites%2Fworldwide%2Fpersonal-computers%2Fconsumer%2Fmonitors-accessories%2Fcomputer-monitors-redesign%2Fmonitors-gateway-og-image%402x.jpg&imgrefurl=https%3A%2F%2Fww'),
(6, 'SSD', 'Lexar', 15, 'Reliable', 'https://www.google.com/imgres?q=monitor&imgurl=https%3A%2F%2Fwww.hp.com%2Fcontent%2Fdam%2Fsites%2Fworldwide%2Fpersonal-computers%2Fconsumer%2Fmonitors-accessories%2Fcomputer-monitors-redesign%2Fmonitors-gateway-og-image%402x.jpg&imgrefurl=https%3A%2F%2Fww'),
(7, 'IT Consultancy', 'IT Consultancy', 100, 'Available anytime ', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fm.indiamart.com%2Fproddetail%2Fit-consultancy-services-24594872397.html&psig=AOvVaw1Z6Jyo8gZQw7J-XpgNkacS&ust=1732348186758000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCNCukpq674kDFQAAAAAdAAAAABA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `Address`) VALUES
(1, 'juma_alpha', '$2y$10$.vY/.a7spd0rpm5lxwhu5ejzY8leO8g52XFSlLip02sZhtbdhq6oS', 'jmlphnc@go.ke', '2024-10-18 21:47:48', '112233'),
(2, 'user', '$2y$10$Kg2TTV81qsLRDclItQ3QgOKVzzRyalK5qKrL8NVuuxfjP1Y9FY0SW', 'user@gail.om', '2024-11-08 00:14:23', NULL),
(3, 'Jaby', '$2y$10$Aw72yq2HWuvFYwlqjGfLcuKvzByQ..MeRAt4ItBX3V2LBAj9VcBGG', 'jab@kenya.com', '2024-11-08 01:40:48', NULL),
(4, 'Jaby it_sltns', '$2y$10$7Jb.SkNU6v3iG8hWc1BQJ.hiAOeUBzSjv75EgM9HS1Kdkuw6DpDK.', 'jabyitsltns@gmail.com', '2024-11-13 18:42:29', NULL),
(5, 'Elvis', '$2y$10$6yxNCerAyBILhrUCrUwvVePIMcvbITZ6gg/De8ZN9Dc0PFf680nbK', 'email@gmail.com', '2024-11-21 06:11:34', NULL),
(6, 'Myself', '$2y$10$YcnblUTIYom161yCsh246eax72QuLbWzxXgyTTbQXHdEp8vpnLHna', 'myself@gmail.com', '2024-11-26 13:36:00', NULL),
(7, 'Abros', '$2y$10$JohtJRX7T3u3ypYDddxVBuysuTkdrOFWiujBLbqroEMQf0oZlxsYW', 'abros@2025.com', '2024-11-27 08:18:32', NULL),
(8, 'Skylar', '$2y$10$30/D1WzKRGMmEwjSkfSIgewrP.WwLuLxDOu6AYJxRfU9Gp9yIWfWG', 'jabyndungu123@gmail.com', '2024-11-27 09:38:37', NULL),
(9, 'online', '$2y$10$PQSmd0wm9CN6zFmGUxI8eecgUw65.6c45YWFBKxfHgSQfoGXLxKbW', 'online@2005', '2024-11-27 09:54:37', NULL),
(10, 'falcon', '$2y$10$CziJkKmEqrwuWklS44e7sO9bMLvmXAKFoREdo.NgR2.QPMtOt01fG', 'falocn123@gmail.com', '2025-02-12 09:06:43', NULL),
(11, 'john', '$2y$10$VIOFQWH4r.FwjuqZUkUe.um8F715MTBOb0R9fH7RIhlTiQnbfOZOm', 'johnson1@gmail.com', '2025-03-25 21:41:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `license_plate` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` enum('Available','In Use','Under Maintenance') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `driver_id`, `vehicle_type`, `license_plate`, `capacity`, `status`) VALUES
(1, 1, 'Truck', 'ABC-1234', 1000, 'Available'),
(2, 2, 'Van', 'XYZ-5678', 500, 'In Use'),
(3, 3, 'Pickup', 'LMN-9012', 800, 'Available'),
(4, 4, 'Truck', 'DEF-3456', 1200, 'Available'),
(5, 5, 'Van', 'GHI-7890', 600, 'Available'),
(6, 6, 'Pickup', 'JKL-2345', 750, 'In Use'),
(7, 7, 'Truck', 'MNO-6789', 1500, 'Available'),
(8, 8, 'Van', 'PQR-1122', 550, 'Under Maintenance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
