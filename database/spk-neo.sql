-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2026 pada 12.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-neo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `risiko_id` int(11) DEFAULT NULL,
  `persen` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `user_id`, `risiko_id`, `persen`, `created_at`) VALUES
(1, 1, 1, 100, '2026-04-15 12:46:48'),
(2, 1, 1, 0, '2026-04-15 12:48:35'),
(3, 1, 1, 50, '2026-04-15 12:49:05'),
(4, 1, 1, 50, '2026-04-15 20:37:14'),
(5, 1, 3, 37.5, '2026-04-15 20:42:45'),
(6, 1, 4, 100, '2026-04-15 20:45:00'),
(7, 1, 3, 50, '2026-04-15 20:57:25'),
(8, 1, 1, 0, '2026-04-15 21:54:38'),
(9, 1, 3, 37.5, '2026-04-15 22:22:57'),
(10, 1, 1, 0, '2026-04-16 01:16:13'),
(11, 1, 1, 0, '2026-04-16 01:28:40'),
(12, 1, 3, 50, '2026-04-16 02:20:26'),
(13, 1, 1, 25, '2026-04-16 02:21:25'),
(14, 1, 1, 25, '2026-04-16 02:21:50'),
(15, 1, 1, 25, '2026-04-16 02:22:19'),
(16, 1, 4, 100, '2026-04-16 02:25:45'),
(17, 1, 1, 25, '2026-04-16 02:26:04'),
(18, 1, 1, 25, '2026-04-16 02:27:38'),
(19, 1, 1, 25, '2026-04-16 02:30:32'),
(20, 1, 1, 0, '2026-04-16 02:44:00'),
(21, 1, 1, 0, '2026-04-16 02:45:12'),
(22, 1, 1, 0, '2026-04-16 02:45:27'),
(23, 1, 1, 0, '2026-04-16 02:45:37'),
(24, 1, NULL, 25, '2026-04-16 02:53:55'),
(25, 1, NULL, 100, '2026-04-16 02:54:30'),
(26, 1, 1, 100, '2026-04-16 02:55:37'),
(27, 1, 1, 25, '2026-04-16 02:56:11'),
(28, 1, 1, 25, '2026-04-16 02:59:07'),
(29, 1, 1, 62.5, '2026-04-16 02:59:34'),
(30, 1, 3, 50, '2026-04-16 03:01:27'),
(32, 1, 1, 50, '2026-04-16 03:09:52'),
(33, 1, 4, 100, '2026-04-16 03:15:18'),
(34, 1, 4, 50, '2026-04-16 03:15:41'),
(35, 1, 1, 50, '2026-04-16 03:15:56'),
(36, 1, 1, 50, '2026-04-16 03:17:39'),
(37, 1, 4, 100, '2026-04-16 03:20:53'),
(38, 1, 1, 100, '2026-04-16 03:21:59'),
(39, 1, 3, 100, '2026-04-16 03:22:53'),
(40, 1, 3, 50, '2026-04-16 03:28:06'),
(41, 1, 3, 50, '2026-04-16 03:28:20'),
(42, 1, 1, 25, '2026-04-16 03:34:02'),
(43, 1, 1, 25, '2026-04-16 04:04:30'),
(44, 1, 4, 100, '2026-04-16 04:11:54'),
(45, 1, 4, 100, '2026-04-16 04:17:43'),
(46, 6, 4, 100, '2026-04-16 04:18:39'),
(47, 6, 1, 25, '2026-04-16 04:22:37'),
(48, 6, 4, 100, '2026-04-16 04:23:46'),
(49, 6, 3, 50, '2026-04-16 04:24:17'),
(50, 6, 3, 50, '2026-04-16 22:36:33'),
(51, 1, 1, 25, '2026-04-18 12:59:06'),
(52, 1, 4, 100, '2026-04-18 12:59:24'),
(53, 6, 3, 50, '2026-04-20 02:25:42'),
(54, 6, 4, 100, '2026-04-20 03:56:02'),
(55, 1, 4, 100, '2026-04-20 09:13:32'),
(56, 6, 4, 100, '2026-04-21 01:22:58'),
(57, 6, 4, 100, '2026-04-21 01:23:07'),
(58, 6, 4, 100, '2026-04-21 01:24:56'),
(59, 6, 3, 50, '2026-04-21 01:25:42'),
(60, 6, 1, 25, '2026-04-21 01:27:34'),
(61, 6, 1, 25, '2026-04-21 01:31:44'),
(62, 6, 4, 100, '2026-04-21 01:32:26'),
(63, 6, 3, 50, '2026-04-21 01:32:42'),
(64, 6, 3, 50, '2026-04-21 01:33:01'),
(65, 6, 1, 25, '2026-04-21 01:34:29'),
(66, 6, 1, 25, '2026-04-21 01:35:35'),
(67, 6, 4, 100, '2026-04-21 01:38:22'),
(68, 6, 4, 100, '2026-04-21 01:38:36'),
(69, 6, 1, 50, '2026-04-21 01:38:48'),
(70, 6, 3, 100, '2026-04-21 01:39:10'),
(71, 6, 1, 0, '2026-04-21 01:39:33'),
(72, 6, 1, 100, '2026-04-21 01:40:33'),
(73, 6, 1, 25, '2026-04-21 02:25:38'),
(74, 6, 1, 0, '2026-04-21 02:28:47'),
(75, 6, 4, 100, '2026-04-21 02:29:00'),
(76, 6, 4, 50, '2026-04-21 02:29:14'),
(77, 6, 4, 100, '2026-04-21 02:31:23'),
(78, 6, 4, 50, '2026-04-21 02:31:43'),
(79, 10, 4, 100, '2026-04-21 08:17:36'),
(80, 1, 4, 100, '2026-04-21 08:30:24'),
(81, 1, 1, 0, '2026-04-21 08:30:47'),
(82, 1, 1, 0, '2026-04-21 08:33:36'),
(83, 1, 1, 0, '2026-04-24 01:54:01'),
(84, 1, 4, 50, '2026-04-24 03:00:23'),
(85, 1, 1, 0, '2026-04-24 03:46:00'),
(86, 1, 1, 100, '2026-04-27 05:01:10'),
(87, 1, 3, 100, '2026-04-27 05:01:36'),
(88, 6, 1, 0, '2026-04-28 08:30:39'),
(89, 6, 1, 0, '2026-04-28 08:35:32'),
(90, 6, 1, 0, '2026-04-28 08:50:02'),
(91, 10, 1, 50, '2026-05-01 12:08:09'),
(92, 10, 1, 50, '2026-05-01 13:17:41'),
(93, 10, 4, 100, '2026-05-03 08:50:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa_detail`
--

CREATE TABLE `diagnosa_detail` (
  `id` int(11) NOT NULL,
  `diagnosa_id` int(11) DEFAULT NULL,
  `gejala_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `diagnosa_detail`
--

INSERT INTO `diagnosa_detail` (`id`, `diagnosa_id`, `gejala_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 6),
(5, 1, 8),
(6, 1, 34),
(7, 3, 4),
(8, 3, 6),
(9, 3, 34),
(10, 4, 1),
(11, 4, 3),
(12, 4, 4),
(13, 4, 5),
(14, 5, 1),
(15, 5, 8),
(16, 5, 34),
(17, 6, 1),
(18, 6, 3),
(19, 6, 4),
(20, 6, 5),
(21, 6, 6),
(22, 6, 7),
(23, 6, 8),
(24, 6, 34),
(25, 7, 3),
(26, 7, 5),
(27, 7, 7),
(28, 7, 34),
(29, 9, 5),
(30, 9, 6),
(31, 9, 8),
(32, 12, 1),
(33, 12, 6),
(34, 12, 7),
(35, 12, 8),
(36, 13, 3),
(37, 13, 4),
(38, 14, 5),
(39, 14, 34),
(40, 15, 5),
(41, 15, 34),
(42, 16, 5),
(43, 16, 34),
(44, 17, 5),
(45, 17, 34),
(46, 18, 5),
(47, 18, 34),
(48, 19, 5),
(49, 19, 34),
(50, 20, 5),
(51, 20, 34),
(52, 21, 5),
(53, 21, 34),
(54, 22, 4),
(55, 22, 5),
(56, 22, 7),
(57, 22, 8),
(58, 22, 34),
(59, 23, 1),
(60, 23, 3),
(61, 23, 4),
(62, 23, 5),
(63, 23, 6),
(64, 23, 7),
(65, 23, 8),
(66, 23, 34),
(67, 24, 5),
(68, 24, 34),
(69, 25, 1),
(70, 25, 3),
(71, 25, 4),
(72, 25, 5),
(73, 25, 6),
(74, 25, 7),
(75, 25, 8),
(76, 25, 34),
(77, 26, 1),
(78, 26, 3),
(79, 26, 4),
(80, 26, 5),
(81, 26, 6),
(82, 26, 7),
(83, 26, 8),
(84, 26, 34),
(85, 27, 5),
(86, 27, 34),
(87, 28, 5),
(88, 28, 6),
(89, 29, 1),
(90, 29, 3),
(91, 29, 4),
(92, 29, 5),
(93, 29, 34),
(94, 30, 1),
(95, 30, 3),
(96, 30, 4),
(97, 30, 34),
(98, 32, 5),
(99, 32, 34),
(100, 33, 1),
(101, 33, 3),
(102, 33, 4),
(103, 33, 5),
(104, 33, 6),
(105, 33, 7),
(106, 33, 8),
(107, 33, 34),
(108, 34, 4),
(109, 34, 5),
(110, 34, 34),
(111, 35, 5),
(112, 35, 34),
(113, 36, 5),
(114, 36, 34),
(115, 37, 4),
(116, 37, 8),
(117, 38, 34),
(118, 38, 3),
(119, 39, 1),
(120, 39, 5),
(121, 39, 6),
(122, 39, 7),
(123, 40, 3),
(124, 40, 5),
(125, 40, 7),
(126, 41, 3),
(127, 41, 5),
(128, 41, 7),
(129, 42, 34),
(130, 42, 3),
(131, 42, 6),
(132, 42, 7),
(133, 43, 1),
(134, 43, 34),
(135, 43, 3),
(136, 43, 7),
(137, 44, 34),
(138, 44, 3),
(139, 44, 4),
(140, 44, 8),
(141, 45, 4),
(142, 45, 8),
(143, 46, 1),
(144, 46, 34),
(145, 46, 3),
(146, 46, 4),
(147, 46, 8),
(148, 47, 1),
(149, 47, 34),
(150, 47, 3),
(151, 47, 4),
(152, 47, 5),
(153, 48, 1),
(154, 48, 34),
(155, 48, 4),
(156, 49, 1),
(157, 49, 34),
(158, 49, 5),
(159, 49, 6),
(160, 49, 7),
(161, 49, 8),
(162, 50, 1),
(163, 50, 5),
(164, 50, 8),
(165, 51, 1),
(166, 51, 34),
(167, 51, 3),
(168, 52, 4),
(169, 52, 8),
(170, 53, 3),
(171, 53, 4),
(172, 53, 5),
(173, 53, 7),
(174, 54, 1),
(175, 54, 34),
(176, 54, 3),
(177, 54, 4),
(178, 54, 5),
(179, 54, 6),
(180, 54, 7),
(181, 54, 8),
(182, 55, 4),
(183, 55, 8),
(184, 58, 3),
(185, 58, 4),
(186, 58, 5),
(187, 58, 6),
(188, 58, 7),
(189, 58, 8),
(190, 59, 1),
(191, 59, 34),
(192, 59, 3),
(193, 59, 5),
(194, 59, 6),
(195, 59, 7),
(196, 60, 34),
(197, 60, 3),
(198, 62, 34),
(199, 62, 3),
(200, 62, 4),
(201, 62, 8),
(202, 63, 1),
(203, 63, 5),
(204, 63, 6),
(205, 63, 7),
(206, 64, 1),
(207, 64, 34),
(208, 64, 3),
(209, 64, 5),
(210, 64, 6),
(211, 64, 7),
(212, 67, 4),
(213, 67, 8),
(214, 68, 4),
(215, 68, 8),
(216, 69, 1),
(217, 69, 34),
(218, 70, 1),
(219, 70, 5),
(220, 70, 6),
(221, 70, 7),
(222, 72, 34),
(223, 72, 3),
(224, 72, 4),
(225, 72, 6),
(226, 75, 4),
(227, 75, 8),
(228, 76, 4),
(229, 77, 34),
(230, 77, 3),
(231, 77, 4),
(232, 77, 8),
(233, 78, 6),
(234, 78, 8),
(235, 79, 1),
(236, 79, 34),
(237, 79, 3),
(238, 79, 4),
(239, 79, 5),
(240, 79, 7),
(241, 79, 8),
(242, 80, 1),
(243, 80, 34),
(244, 80, 3),
(245, 80, 4),
(246, 80, 5),
(247, 80, 7),
(248, 80, 8),
(249, 84, 6),
(250, 84, 8),
(251, 86, 34),
(252, 86, 3),
(253, 86, 5),
(254, 86, 6),
(255, 86, 7),
(256, 87, 1),
(257, 87, 5),
(258, 87, 6),
(259, 87, 7),
(260, 87, 8),
(261, 90, 6),
(262, 90, 8),
(263, 91, 34),
(264, 91, 5),
(265, 91, 7),
(266, 92, 3),
(267, 92, 5),
(268, 92, 6),
(269, 92, 7),
(270, 93, 1),
(271, 93, 34),
(272, 93, 3),
(273, 93, 4),
(274, 93, 5),
(275, 93, 6),
(276, 93, 7),
(277, 93, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deskripsi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `kode`, `name`, `deskripsi`) VALUES
(1, 'G001', 'Perubahan bentuk puting', 'Perubahan bentuk puting adalah saat puting tiba-tiba cekung masuk, membesar, atau berubah bentuk tanpa alasan jelas (bukan karena hamil/menyusui)'),
(3, 'G003', 'Terdapat benjolan pada payudara', 'Gumpalan keras atau lunak yang teraba di dada, bisa bergerak atau tetap di tempat.'),
(4, 'G004', 'Salah satu puting berubah warna merah, coklat, dan kekuning-kuningan', 'Salah satu puting berubah warna jadi merah, coklat, atau kekuning-kuningan tiba-tiba tanpa alasan jelas (bukan karena hamil/menyusui).'),
(5, 'G005', 'Terjadi iritasi kulit dan gatal-gatal pada payudara', 'Iritasi kulit dan gatal-gatal pada payudara adalah saat kulit dada terasa gatal, merah, kering, atau bersisik tiba-tiba tanpa alasan jelas (bukan karena bra ketat/sabun biasa)\r\n'),
(6, 'G006', 'Puting masuk kedalam', 'Puting masuk ke dalam adalah saat puting tiba-tiba cekung atau tertarik ke dalam tanpa alasan jelas (bukan karena bawaan lahir atau menyusui).'),
(7, 'G007', 'Salah satu payudara membesar', 'Salah satu payudara membesar adalah saat satu sisi dada tiba-tiba lebih besar dari yang lain tanpa alasan jelas (bukan karena hormon haid atau menyusui).'),
(8, 'G008', 'Kulit payudara terasa kasar, seperti kulit jeruk', 'Kulit payudara terasa kasar seperti kulit jeruk adalah saat permukaan kulit dada jadi bergerigi, tebal, atau bopeng tiba-tiba tanpa alasan jelas (bukan karena alergi biasa).'),
(34, 'G002', 'Rasa nyeri pada bagian payudara', 'Rasa nyeri pada payudara adalah saat dada terasa sakit, berat, atau panas, bisa di satu atau dua sisi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `risiko`
--

CREATE TABLE `risiko` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `risiko`
--

INSERT INTO `risiko` (`id`, `kode`, `name`, `deskripsi`, `saran`, `level`) VALUES
(1, 'R01', 'Rendah', 'Risiko kecil', 'Tetap waspada', 1),
(3, 'R02', 'Sedang', 'Perlu pemeriksaan lanjut', 'Konsultasi dokter', 2),
(4, 'R03', 'Tinggi', 'Risiko serius', 'Segera ke dokter', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `id` int(11) NOT NULL,
  `id_risiko` int(11) DEFAULT NULL,
  `id_solusi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`id`, `id_risiko`, `id_solusi`) VALUES
(2, 1, 1),
(3, 3, 2),
(9, 4, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule_detail`
--

CREATE TABLE `rule_detail` (
  `id` int(11) NOT NULL,
  `id_rule` int(11) DEFAULT NULL,
  `id_gejala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rule_detail`
--

INSERT INTO `rule_detail` (`id`, `id_rule`, `id_gejala`) VALUES
(26, 2, 34),
(27, 2, 3),
(28, 3, 1),
(29, 3, 5),
(30, 3, 6),
(31, 3, 7),
(34, 9, 4),
(35, 9, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE `solusi` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `solusi_1` text DEFAULT NULL,
  `solusi_2` text DEFAULT NULL,
  `solusi_3` text DEFAULT NULL,
  `solusi_4` text DEFAULT NULL,
  `solusi_5` text DEFAULT NULL,
  `solusi_6` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`id`, `kode`, `keterangan`, `solusi_1`, `solusi_2`, `solusi_3`, `solusi_4`, `solusi_5`, `solusi_6`, `created_at`, `updated_at`) VALUES
(1, 'S01', 'Anda tidak memiliki risiko terkena Tumor Payudara saat ini. Namun tetap jaga pola hidup sehat ', 'Melakukan SADARI (Periksa Payudara Sendiri) secara rutin setiap bulan', 'Menjaga pola hidup sehat', 'Melakukan program olahraga teratur', 'Menghindari faktor risiko seperti merokok dan alkohol', 'Edukasi pencegahan dan pengobatan.', '', NULL, NULL),
(2, 'S02', 'Anda memiliki risiko sedang atau mulai terindikasi tumor payudara. Disarankan untuk lebih waspada untuk mencegah keadaan memburuk', 'Segera melakukan pemeriksaan penunjang seperti USG payudara, dan Mammografi', 'Segera melakukan pemeriksaan di fasilitas pelayanan kesehatan', 'Tetap menerapkan pola hidup sehat', 'Melakukan program olahraga teratur', 'Menghindari faktor risiko seperti merokok dan alcohol', 'Edukasi pencegahan dan pengobatan', NULL, NULL),
(3, 'S03', 'Anda terindikasi memiliki risiko tinggi tumor payudara. Segera lakukan konsultasi dengan tenaga medis untuk pemeriksaan lebih lanjut dan penanganan yang tepat', 'Segera konsultasi ke dokter ahli untuk penanganan yang tepat', 'Melakukan pemeriksaan diagnostik lanjutan seperti Mammografi, USG payudara, Biopsi', 'Tetap menerapkan pola hidup sehat', 'Melakukan program olahraga teratur', 'Menghindari faktor risiko seperti merokok dan alkohol', 'Edukasi pencegahan dan pengobatan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `usia` int(10) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(5) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `tgl_lahir`, `usia`, `alamat`, `username`, `password`, `role`, `foto`, `created_at`) VALUES
(1, 'farah', '2015-03-18', 11, 'Arjawinangun', 'farah', '$2a$12$JZ5sREtUOJXqnbC1J1eZ6.yNdJv.QQcT88xdEnbggr/7vf25ZCG4u', 1, '', '2026-04-07 16:35:16'),
(6, 'Fadil', '2003-02-08', 23, 'Karang Wareng', 'pasien', '$2y$12$qmvqV28pNPQ3ZjrjWqbBX.b5mvDMyRmk1708GVjhGKPsSpEva2XyK', 2, '1776159610.jpeg', '2026-04-14 09:05:21'),
(8, 'Rani', '2022-02-01', 4, 'jayapura', 'Rani', '$2y$12$2P5cr/t8lasQby/NyiOplOSJcuPTDfPSrIVwTxy1O5EPE.eRXb8ZO', 2, '', '2026-04-20 05:20:39'),
(9, 'adi', '2021-02-02', 5, 'jayapura', 'adi', '$2y$12$6FU0nJJabaGLkucHWi4Rd.7t6tOiUnhJZrxCyuM3Cu9S8sQmEdSkq', 2, '', '2026-04-20 09:07:05'),
(10, 'faqih', '2017-06-01', 8, 'arjawinangun', 'faqih', '$2y$12$jh/i63Dq8zf5UERGeZszNuduNUbmguRPh8zvK1cc8AAwrO/dOuDWK', 2, '', '2026-04-21 08:08:58'),
(11, 'LENI FEBRIANI', '2026-04-09', 0, 'arjawinangun', 'leni', '$2y$12$xzpwbsFhVcBUqY3Sl7tvaOglTkMtVdEjjJpdR7kcDKLvGlTB1mFgi', 1, '1776779024.jpeg', '2026-04-21 13:43:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `risiko_id` (`risiko_id`);

--
-- Indeks untuk tabel `diagnosa_detail`
--
ALTER TABLE `diagnosa_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosa_id` (`diagnosa_id`),
  ADD KEY `gejala_id` (`gejala_id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `risiko`
--
ALTER TABLE `risiko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_risiko` (`id_risiko`);

--
-- Indeks untuk tabel `rule_detail`
--
ALTER TABLE `rule_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rule` (`id_rule`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `diagnosa_detail`
--
ALTER TABLE `diagnosa_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `risiko`
--
ALTER TABLE `risiko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rule_detail`
--
ALTER TABLE `rule_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD CONSTRAINT `diagnosa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `diagnosa_ibfk_2` FOREIGN KEY (`risiko_id`) REFERENCES `risiko` (`id`);

--
-- Ketidakleluasaan untuk tabel `diagnosa_detail`
--
ALTER TABLE `diagnosa_detail`
  ADD CONSTRAINT `diagnosa_detail_ibfk_1` FOREIGN KEY (`diagnosa_id`) REFERENCES `diagnosa` (`id`),
  ADD CONSTRAINT `diagnosa_detail_ibfk_2` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`);

--
-- Ketidakleluasaan untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD CONSTRAINT `rule_ibfk_1` FOREIGN KEY (`id_risiko`) REFERENCES `risiko` (`id`);

--
-- Ketidakleluasaan untuk tabel `rule_detail`
--
ALTER TABLE `rule_detail`
  ADD CONSTRAINT `rule_detail_ibfk_1` FOREIGN KEY (`id_rule`) REFERENCES `rule` (`id`),
  ADD CONSTRAINT `rule_detail_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
