-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 04:45 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmsimple`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `count_people` ()  BEGIN
SELECT COUNT(id) FROM customers;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_info` ()  BEGIN
SELECT name, surname FROM customers;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_name_by_id` (IN `id` INT, OUT `name` VARCHAR(50))  BEGIN
SELECT name INTO name FROM customers WHERE id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_user_details` (IN `id` INT)  BEGIN
SELECT * FROM customers WHERE id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `personel_salary` ()  BEGIN
SELECT d.salary, p.name FROM personel as p JOIN departments as d ON p.department_id = d.id; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'giyim'),
(2, 'mutfak'),
(3, 'elektronik'),
(4, 'spor');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` timestamp NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `full_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `email`, `date_of_birth`, `created_at`, `updated_at`, `full_name`) VALUES
(2, 'john', 'doe', 'jdoe@live.com', '1990-09-11 21:00:00', '2018-11-22 11:08:57', '2018-11-24 19:23:49', NULL),
(3, 'jane', 'doe', 'jndoe@live.com', '1996-09-11 21:00:00', '2018-11-22 11:08:57', '2018-11-24 19:23:49', NULL),
(4, 'margai', 'wangara', 'mwangara@wangaras.me', '2000-10-12 21:00:00', '2018-11-22 11:08:57', '2018-11-24 19:23:49', NULL),
(6, 'mgaza', 'ong\'amo', 'mgaza@live.com', '2010-08-10 21:00:00', '2018-11-22 11:08:57', '2018-11-24 19:23:49', NULL),
(9, 'lukas', 'luke', 'lukas@luke.com', '2001-10-09 21:00:00', '2018-12-27 19:56:35', '2018-12-27 20:02:38', NULL),
(10, 'lady', 's', 'ladys@kenya.co.ke', '1990-10-10 21:00:00', '2018-12-28 09:59:12', '2018-12-28 09:59:12', 'lady s'),
(11, 'another', 'user', 'anuser@here.com', '2001-10-09 21:00:00', '2018-12-28 12:37:18', '2018-12-28 12:37:18', 'another user'),
(12, 'drop', 'user', 'drop@user.com', '2003-05-09 21:00:00', '2018-12-28 12:39:46', '2018-12-28 12:39:46', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `customers_data`
-- (See below for the actual view)
--
CREATE TABLE `customers_data` (
`id` int(11)
,`name` varchar(50)
,`surname` varchar(50)
,`email` varchar(50)
,`date_of_birth` timestamp
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `salary` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `salary`) VALUES
(1, 'production', '20000.00'),
(2, 'human resources', '15000.00'),
(3, 'research and development', '30000.00'),
(4, 'marketting', '10000.00'),
(5, 'account and financing', '50000.00');

-- --------------------------------------------------------

--
-- Table structure for table `personel`
--

CREATE TABLE `personel` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` timestamp NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personel`
--

INSERT INTO `personel` (`id`, `department_id`, `name`, `surname`, `email`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(1, 1, 'ali', 'doe', 'alidoe@live.com', '1971-09-11 21:00:00', '2018-11-22 11:28:20', '2018-11-24 19:29:16'),
(2, 2, 'lily', 'doe', 'lilydoe@live.com', '1972-09-11 21:00:00', '2018-11-22 11:28:20', '2018-11-24 19:53:23'),
(3, 1, 'juma', 'wangara', 'jwangara@wangaras.me', '2001-10-12 21:00:00', '2018-11-22 11:28:20', '2018-11-24 19:29:16'),
(4, 1, 'mark', 'mark', 'mark@sakarya.edu.tr', '2002-01-31 21:00:00', '2018-11-22 11:28:20', '2018-11-24 19:29:17'),
(5, 1, 'sila', 'pektas', 'spektas@istanbul.edu.tr', '2005-08-10 21:00:00', '2018-11-22 11:28:20', '2018-11-24 19:29:17'),
(6, 1, 'luke', 'oduor', 'luke@kenya.gov.ke', '1973-10-09 21:00:00', '2018-11-22 11:28:20', '2018-11-24 19:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `personelcc`
--

CREATE TABLE `personelcc` (
  `id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` timestamp NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personelcc`
--

INSERT INTO `personelcc` (`id`, `department_id`, `name`, `surname`, `email`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(1, 1, 'ali', 'doe', 'alidoe@live.com', '0000-00-00 00:00:00', '2018-11-22 11:28:20', '2018-11-23 07:12:32'),
(2, 1, 'lily', 'doe', 'lilydoe@live.com', '0000-00-00 00:00:00', '2018-11-22 11:28:20', '2018-11-23 07:12:32'),
(3, 1, 'juma', 'wangara', 'jwangara@wangaras.me', '0000-00-00 00:00:00', '2018-11-22 11:28:20', '2018-11-23 07:12:32'),
(4, 1, 'mark', 'mark', 'mark@sakarya.edu.tr', '0000-00-00 00:00:00', '2018-11-22 11:28:20', '2018-11-23 07:12:32'),
(5, 1, 'sila', 'pektas', 'spektas@istanbul.edu.tr', '0000-00-00 00:00:00', '2018-11-22 11:28:20', '2018-11-23 07:12:32'),
(6, 1, 'luke', 'oduor', 'luke@kenya.gov.ke', '0000-00-00 00:00:00', '2018-11-22 11:28:20', '2018-11-23 07:12:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `personel_salary`
-- (See below for the actual view)
--
CREATE TABLE `personel_salary` (
`name` varchar(50)
,`surname` varchar(50)
,`dname` varchar(100)
,`salary` decimal(8,2)
,`department_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `personel_salary_less_than_20000`
-- (See below for the actual view)
--
CREATE TABLE `personel_salary_less_than_20000` (
`name` varchar(50)
,`surname` varchar(50)
,`dname` varchar(100)
,`salary` decimal(8,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `stock`, `price`, `created_at`, `updated_at`) VALUES
(1, 'black and white shirt', 1, 50, '100.00', '2018-11-22 11:39:06', '2018-11-23 07:25:01'),
(2, 'dark green khaki pants', 1, 60, '200.50', '2018-11-22 11:39:07', '2018-11-23 07:25:01'),
(3, 'brown leather shoes', 1, 70, '90.25', '2018-11-22 11:39:07', '2018-11-23 07:25:01'),
(4, 'sporting white reebok shoes', 1, 90, '120.45', '2018-11-22 11:39:07', '2018-11-23 07:25:01'),
(5, 'custom made mug for programmers', 1, 100, '25.90', '2018-11-22 11:39:07', '2018-11-23 07:25:01'),
(6, 'samsung galaxy S6 phone', 1, 20, '1850.95', '2018-11-22 11:39:07', '2018-11-23 07:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `productscc`
--

CREATE TABLE `productscc` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productscc`
--

INSERT INTO `productscc` (`id`, `name`, `category`, `stock`, `price`, `created_at`, `updated_at`) VALUES
(1, 'black and white shirt', 1, 50, '100.00', '2018-11-22 11:39:06', '2018-11-23 07:25:01'),
(2, 'dark green khaki pants', 1, 60, '200.50', '2018-11-22 11:39:07', '2018-11-23 07:25:01'),
(3, 'brown leather shoes', 1, 70, '90.25', '2018-11-22 11:39:07', '2018-11-23 07:25:01'),
(4, 'sporting white reebok shoes', 1, 90, '120.45', '2018-11-22 11:39:07', '2018-11-23 07:25:01'),
(5, 'custom made mug for programmers', 1, 100, '25.90', '2018-11-22 11:39:07', '2018-11-23 07:25:01'),
(6, 'samsung galaxy S6 phone', 1, 20, '1850.95', '2018-11-22 11:39:07', '2018-11-23 07:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `products_sale`
--

CREATE TABLE `products_sale` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_sale`
--

INSERT INTO `products_sale` (`id`, `cust_id`, `prod_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 20, '2018-11-24 18:28:59', '2018-11-24 18:28:59'),
(3, 4, 2, 5, '2018-11-24 20:42:19', '2018-11-24 20:42:19'),
(4, 4, 3, 2, '2018-11-24 20:43:01', '2018-11-24 20:43:01'),
(5, 4, 5, 2, '2018-11-24 20:43:01', '2018-11-24 20:43:01'),
(8, 2, 3, 2, '2018-11-24 20:43:02', '2018-11-24 20:43:02'),
(10, 3, 6, 1, '2018-11-24 20:43:02', '2018-11-24 20:43:02'),
(13, 6, 5, 2, '2018-11-24 20:43:02', '2018-11-24 20:43:02'),
(14, 6, 2, 2, '2018-11-24 20:43:02', '2018-11-24 20:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user@me.com', '$2y$10$V2BJmgayl5ryf68URO0MCuSsQVo4q.85F3o4PJ0XiplOkfRHfAVAS', 4, '2018-12-27 18:22:02', '2018-12-27 18:22:02'),
(2, 'g@u.com', '$2y$10$buZsTQAuPGdFAfpBKThgSO269bR4uNwAoJWa8k50bz8QLSAXiKXzK', 3, '2018-12-28 09:05:25', '2018-12-28 09:05:25'),
(3, 'm@here.com', '$2y$10$yQ7uZP3sEgN.jTR8tLFSku2Sh8Hu4GtXSEoC1suuDHWT8q.fV2Jfq', 4, '2018-12-28 14:28:32', '2018-12-28 14:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`) VALUES
(3, 'admin'),
(4, 'standard');

-- --------------------------------------------------------

--
-- Structure for view `customers_data`
--
DROP TABLE IF EXISTS `customers_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customers_data`  AS  select `customers`.`id` AS `id`,`customers`.`name` AS `name`,`customers`.`surname` AS `surname`,`customers`.`email` AS `email`,`customers`.`date_of_birth` AS `date_of_birth`,`customers`.`created_at` AS `created_at`,`customers`.`updated_at` AS `updated_at` from `customers` ;

-- --------------------------------------------------------

--
-- Structure for view `personel_salary`
--
DROP TABLE IF EXISTS `personel_salary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `personel_salary`  AS  select `c`.`name` AS `name`,`c`.`surname` AS `surname`,`d`.`name` AS `dname`,`d`.`salary` AS `salary`,`c`.`department_id` AS `department_id` from (`personel` `c` join `departments` `d` on((`d`.`id` = `c`.`department_id`))) where (`d`.`salary` < 20000) ;

-- --------------------------------------------------------

--
-- Structure for view `personel_salary_less_than_20000`
--
DROP TABLE IF EXISTS `personel_salary_less_than_20000`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `personel_salary_less_than_20000`  AS  select `c`.`name` AS `name`,`c`.`surname` AS `surname`,`d`.`name` AS `dname`,`d`.`salary` AS `salary` from (`personel` `c` join `departments` `d` on((`d`.`id` = `c`.`department_id`))) where (`d`.`salary` < 20000) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_personel_department` (`department_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `products_sale`
--
ALTER TABLE `products_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_user_roles_users` (`role`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personel`
--
ALTER TABLE `personel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products_sale`
--
ALTER TABLE `products_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personel`
--
ALTER TABLE `personel`
  ADD CONSTRAINT `FK_personel_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE SET NULL,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_sale`
--
ALTER TABLE `products_sale`
  ADD CONSTRAINT `FK_prdsale_customers` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_prdsale_products` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sale_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sale_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sale_ibfk_3` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
