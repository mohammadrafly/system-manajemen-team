-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2022 at 11:01 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2022-05-15-043813', 'App\\Database\\Migrations\\Users', 'default', 'App', 1652591504, 1),
(6, '2022-05-15-043835', 'App\\Database\\Migrations\\Posts', 'default', 'App', 1652591504, 1),
(7, '2022-05-15-053343', 'App\\Database\\Migrations\\Posts', 'default', 'App', 1652592834, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` enum('riwayat','jadwal') NOT NULL,
  `pict` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category`, `pict`, `waktu`, `created_at`, `updated_at`) VALUES
(5, 'Latihan Rutin', 'seperti biasa memakai baju bebas dan sepatu bola', 'jadwal', NULL, '05/19/2022', '2022-05-19 11:21:58', '2022-05-19 11:21:58'),
(6, 'Juara 1 sekabupaten ', 'Persikota FC telah memanangkan ANU cup champion yang di selenggarakan oleh deo akbar p', 'riwayat', '1652942353_61a514b850cbd7d5966a.jpg', '', '2022-05-19 13:39:13', '2022-05-19 13:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `strukturssb`
--

CREATE TABLE `strukturssb` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strukturssb`
--

INSERT INTO `strukturssb` (`id`, `picture`, `created_at`, `updated_at`) VALUES
(1, '1652952167_9694d4642ccc2214934b.png', '2022-05-19 16:22:47', '2022-05-19 16:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tagihan` varchar(255) NOT NULL,
  `status_transaksi` enum('PAID','UNPAID') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaksi`, `id_user`, `tagihan`, `status_transaksi`, `created_at`, `updated_at`) VALUES
(5, 17, '10000', 'PAID', '2022-05-19 10:20:59', '2022-05-19 10:20:59'),
(6, 21, '10000', 'UNPAID', '2022-05-19 14:32:11', '2022-05-19 14:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','siswa','unset') NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomor_hp` varchar(13) DEFAULT NULL,
  `ttl` varchar(255) DEFAULT NULL,
  `gender` enum('laki-laki','perempuan') DEFAULT NULL,
  `foto_diri` varchar(255) DEFAULT NULL,
  `foto_akte` varchar(255) DEFAULT NULL,
  `riwayat_penyakit` varchar(255) DEFAULT NULL,
  `posisi_pemain` enum('Goalkeeper','Back','Midfielder','Forward') DEFAULT NULL,
  `status` enum('diterima','ditolak','pending') DEFAULT NULL,
  `note` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `nama`, `nomor_hp`, `ttl`, `gender`, `foto_diri`, `foto_akte`, `riwayat_penyakit`, `posisi_pemain`, `status`, `note`, `created_at`, `updated_at`) VALUES
(10, 'users', '$2y$10$AXf6EQeasIITrUTFqpEmkeBTJ8q93h/CRss6tEnbv./0bTM2oGlEu', 'admin', 'Muhammad Silicon Valley', '081237127312', NULL, 'laki-laki', '1652832653_125f8c9f70279f4c0713.png', NULL, NULL, '', 'pending', '', '2022-05-18 00:50:23', '2022-05-18 00:50:23'),
(17, 'ahmad', '$2y$10$o2hGJ2mEF5y0RxwSEJR14eiTPkX7R2I1gBMkwLxu8sOgTOi4GBG4q', 'siswa', 'Ahmad Abdul Kryptonian', '0819078713087', NULL, 'laki-laki', NULL, NULL, NULL, '', 'pending', '', '2022-05-18 03:11:02', '2022-05-18 03:11:02'),
(19, 'admin', '$2y$10$qLYRkwXGj5hmqATUdjouzeA2W3kusreSwHZ6SkM91sVJVQRAeoFqq', 'admin', 'admin', '089786765463', NULL, 'laki-laki', '1652834208_0fbaeadc2485e6a7b8ca.png', NULL, NULL, NULL, NULL, '', '2022-05-18 07:36:26', '2022-05-18 07:36:26'),
(20, 'test', '$2y$10$IjylU6hvDnrNYdVVDv6ukugzCJI/53z3yOMDxwSMbaiggvBR08so6', 'siswa', 'test', '123123123123', NULL, 'laki-laki', '1652931681_dc44657d91b5a127765c.webp', NULL, NULL, NULL, NULL, '', '2022-05-19 10:25:44', '2022-05-19 10:25:44'),
(21, 'harrison', '$2y$10$oKRZMMgrvMOqm9X7oYKauOD0Rt9/r1cGK4K7Djlcvattf/I8HA5mW', 'siswa', 'Harrison Gerard', '089765674632', '07/24/2002', 'laki-laki', '1652940836_0d74fbbef8553ef21bbf.png', '1652940836_7b0211a4e862d4ad1eb1.png', '1652940836_d80c197285b496241f75.png', 'Back', 'diterima', 'Selamat anda telah diterima di Persikota FC', '2022-05-19 11:31:35', '2022-05-19 11:31:35'),
(22, 'test2', '$2y$10$QrMhCir0lFNa0KCBtAUNB.b1qpAP/wDNE2xFbB4O6bSuKeUBG.seC', 'unset', 'test', '123123123123', '05/25/2022', 'laki-laki', '1652938700_a600b6db427533fb5d22.png', '1652938700_20e56333639379e33bcc.png', '1652938700_3445934d05d2ee1a4412.png', 'Midfielder', 'ditolak', 'Foto tidak jelas', '2022-05-19 12:37:47', '2022-05-19 12:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strukturssb`
--
ALTER TABLE `strukturssb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `strukturssb`
--
ALTER TABLE `strukturssb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
