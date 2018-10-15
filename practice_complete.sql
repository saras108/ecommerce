-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2018 at 11:33 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice_complete`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Norman Salazar', 'ogoek@example.com', '$2y$10$J9yyZQ4HmBXs41YRA7xyCu14WZHsi658GpzH3vRyome/Ni07DzikS', 1, 'fsOTr5zbG4aeW8WPQ1kNzIYjt0phmh4nif4ZsbKiquShEkmLa4KKhXhWvvBw', '2018-10-03 05:05:01', '2018-10-08 05:05:17'),
(2, 'Mabelle Wilkerson', 'bubeksej@host.local', '$2y$10$JG4tZV6M27/n/50cbi0bUOVr23tj0KzdWepUvp3lIfHVaGxUvfoyq', 0, 'hyAGJRzfpZQ7wkbb0SyFXd06c7yvJDSXF1NNiVAkD9zDtugoXZJta9CjLIrS', '2018-10-08 00:46:27', '2018-10-11 01:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `print` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `display` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `store_id`, `brand_name`, `print`, `size`, `cost`, `color`, `photo`, `description`, `images`, `status`, `display`, `created_at`, `updated_at`) VALUES
(1, 1, 'Phoebe Moore', 'va', 'Smaller', '888', 'iv', 'FKSYCckrFX.jpg', '<p>fdsaf</p>', '""', 0, 1, '2018-10-10 06:30:41', '2018-10-12 00:02:41'),
(2, 1, 'Phoebe Moore', 'va', 'Smaller', '999', 'iv', '7ROq5TNyiw.jpg', '<p>fdsaf</p>', '""', 0, 1, '2018-10-10 06:31:10', '2018-10-12 00:02:57'),
(3, 1, 'John Doyle', 'les', 'Small', '488', 'teis', '6ZgzpQktrF.jpg', '<p>fdsf</p>', '""', 0, 1, '2018-10-10 06:32:13', '2018-10-12 00:03:25'),
(4, 1, 'Flora Roberson', 'sorjek', 'Smaller', '399', 'kafa', 'ZA1xZMCqXD.jpg', '<p>fsdafs</p>', '""', 1, 1, '2018-10-11 00:33:08', '2018-10-12 00:03:36'),
(5, 1, 'Ethan Miles', 'lujhumdij', 'Smaller', '299', 'ecripo', 'pnF8LGJp8G.jpg', '<p>fdsvg</p>', '""', 1, 1, '2018-10-11 00:45:05', '2018-10-12 00:03:54'),
(6, 2, 'kfjdsfsv', 'nepema', 'Larger', '111', 'iglimuj', 'AZf9sNM2p6.jpeg', '<p>fsdgfdsa</p>', '""', 1, 1, '2018-10-11 01:33:47', '2018-10-11 04:27:23'),
(7, 2, 'Mina Ball', 'kownizaz', 'Larger', '333', 'wupucpin', 'pnF8LGJp8G.jpg', '<p>fsdga</p>', '["JdMRoAzsUV.jpg","QXaiB6Khfz.jpg","U4nbb2SbpT.jpeg"]', 1, 0, '2018-10-11 03:52:59', '2018-10-11 04:35:49'),
(8, 1, 'Nina Moody', 'boevnan', 'Medium', '999', 'edaraw', 'AZf9sNM2p6.jpeg', '<p>gfdghf</p>', '""', 1, 1, '2018-10-11 23:58:08', '2018-10-12 00:04:24');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_21_053026_create_admins_table', 1),
(4, '2018_09_26_085519_create_owners_table', 1),
(5, '2018_10_01_121918_create_stores_table', 1),
(6, '2018_10_08_071257_create_owner_lists_table', 2),
(7, '2018_10_10_104957_create_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@ncs.technology', '$2y$10$P6n3qhoDWP2OIgn2YXNBuutgXdYbsk8DUtv.mKQoMQApDag9Wk0pW', 1, 'tVqZv0H88TeukhQYeaZXETMFDg9XYcFiT4xgXkkYjmMAiu6tVudNMiMIXgfD', '2018-10-02 18:15:00', '2018-10-02 18:15:00'),
(2, 'Mattie Martin', 'zad@example.com', '$2y$10$au9JIB9c6KvM8M9Y8IghPOiO96mIHaZrvSSk/Wtf7LbbBwZY6KEra', 0, '1MVbYTggtxwwCxcYkjVAlBbqykeVBxbAQzAmQRlN', '2018-10-08 03:00:33', '2018-10-08 03:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `owner_lists`
--

CREATE TABLE `owner_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizionship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifyToken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `display` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_lists`
--

INSERT INTO `owner_lists` (`id`, `Name`, `email`, `citizionship`, `contact`, `profession`, `images`, `verifyToken`, `status`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Genevieve Morris', 'sepfibra@host.local', '32', '8419607049', 'Activate', '', 'BN0amllwjPYTbiODO5XmwJZXWi2yYwzN7agARD7T', 0, 1, '2018-10-08 01:45:26', '2018-10-08 04:44:10'),
(2, 'Alice Rhodes', 'okuisu@example.com', '25', '9175128137', 'Activate', '', 'nEm0yJ3p0XYSh9vsDaQJwmAtSqUBozEipFeBQVBY', 0, 1, '2018-10-08 01:46:48', '2018-10-08 04:44:07'),
(3, 'Vernon Howell', 'nunfad@host.local', '47', '7076819563', 'Activate', '', 'UXbDVD9K43STpfny4Ff2EpqTMgm9rFlNA9z9h6DL', 0, 1, '2018-10-08 01:47:04', '2018-10-08 01:47:04'),
(4, 'Hilda Reid', 'jemvet@example.com', '21', '4153786049', 'Activate', '', 'gkOzWhPvACionmzWirbcHj0tvK5BBb8c64zywWP3', 0, 1, '2018-10-08 01:54:43', '2018-10-08 04:23:00'),
(5, 'Francis Roberson', 'jofso@host.invalid', '52', '5692218154', 'Deactivate', '', 'Na8j8cSMtjDN7RYhIAX0uDNREfu2uE32qrccUQ1o', 0, 0, '2018-10-08 01:56:30', '2018-10-08 04:44:05'),
(6, 'Steve Tyler', 'hovsotfem@host.test', '71', '7243946376', 'Activate', '', 'wMFzba6rx6njX3QRpooqDI6ZBd0qGqGXBiw9KGwW', 0, 1, '2018-10-08 01:57:25', '2018-10-08 04:21:27'),
(7, 'Mattie Martin', 'zad@example.com', '25', '9714871801', 'Activate', '', NULL, 1, 1, '2018-10-08 02:04:22', '2018-10-08 04:48:36'),
(8, 'Trevor Coleman', 'muwoaga@example.com', '98', '9442414845', 'Activate', '', 'ahtKXJGmiqxaTKe4akJjl0gEaLaTPMXGRoAkh6Np', 0, 1, '2018-10-08 02:34:42', '2018-10-08 04:21:08'),
(9, 'Earl Cohen', 'kip@host.invalid', '48', '9398675925', 'Activate', '', '8sEitp4QKr4aXGGK10edqrmEVIM7nJhndlYuwZ0O', 0, 1, '2018-10-08 02:37:44', '2018-10-08 04:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('zad@example.com', '$2y$10$DOlgHcBpvNqWvUjUHD435O79YlkR1kuI1MO0Iw4oy1NFd1sItQfK.', '2018-10-08 06:28:37'),
('ogoek@example.com', '$2y$10$vQEr7zlTkO0mPTq4A1hLM.8kpMwaex1EdZN0EfcGAwoVlfAqUYHDS', '2018-10-08 06:42:36'),
('admin@ncs.technology', '$2y$10$BNE0Tp/oMIEwkPx56f3GEeLb3FPV77rIEPW/iJMm/cXK6qAzYsCyS', '2018-10-10 03:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizionship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifyToken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `display` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `owner_name`, `email`, `store_name`, `location`, `citizionship`, `contact`, `profession`, `images`, `verifyToken`, `status`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Norman Salazar', 'ogoek@example.com', 'Gilbert Parks', 'Camizdon', '41', '4795261292', 'Activate', '', NULL, 1, 1, '2018-10-03 05:02:04', '2018-10-08 04:41:45'),
(2, 'Mabelle Wilkerson', 'bubeksej@host.local', 'Cameron Benson', 'Zorfuner', '20', '5335893186', 'Activate', '', NULL, 1, 1, '2018-10-08 00:44:45', '2018-10-08 04:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_store_id_foreign` (`store_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_email_unique` (`email`);

--
-- Indexes for table `owner_lists`
--
ALTER TABLE `owner_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owner_lists_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stores_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owner_lists`
--
ALTER TABLE `owner_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `admins` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
