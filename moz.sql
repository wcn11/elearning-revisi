-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2019 at 11:19 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moz`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `kode_hasil` varchar(30) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `jawaban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judul_soal`
--

CREATE TABLE `judul_soal` (
  `kode_judul_soal` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `kode_mapel` varchar(25) NOT NULL,
  `kode_mentor_pelajaran` varchar(25) DEFAULT NULL,
  `judul` varchar(191) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `tanggal_mulai` varchar(20) DEFAULT NULL,
  `tanggal_selesai` varchar(20) DEFAULT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diupdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_soal`
--

INSERT INTO `judul_soal` (`kode_judul_soal`, `id_mentor`, `kode_mapel`, `kode_mentor_pelajaran`, `judul`, `jumlah_soal`, `tanggal_mulai`, `tanggal_selesai`, `dibuat`, `diupdate`) VALUES
('KJS-1-10-6', 'MNTR-1', 'MPL-10', 'MP-1-10-10-1', 'Quiz Fisika Kelas 10', 5, '2019-09-19 00:00:00', '2019-10-17 11:01:00', '2019-08-31 15:55:33', '2019-08-31 15:55:33'),
('KJS-1-10-7', 'MNTR-1', 'MPL-10', 'MP-1-12-10-4', 'Quiz Fisika Kelas 12', 5, '2019-08-29 01:05:00', '2019-10-16 02:10:00', '2019-08-31 16:04:44', '2019-08-31 16:04:44'),
('KJS-1-10-8', 'MNTR-1', 'MPL-10', 'MP-1-12-10-4', 'Quiz Fisika Kelas 12 ke 2', 5, '2019-08-29 01:05:00', '2019-10-16 02:10:00', '2019-08-31 16:05:16', '2019-08-31 16:05:16'),
('KJS-1-11-4', 'MNTR-1', 'MPL-11', 'MP-1-10-11-4', 'Quiz Biologi Kelas 10', 5, '2019-09-09 05:20:00', '2019-09-24 05:25:00', '2019-08-31 15:21:23', '2019-08-31 15:21:23'),
('KJS-1-11-6', 'MNTR-1', 'MPL-11', 'MP-1-11-11-4', 'Quiz Biologi Kelas 11', 5, '2019-09-11 02:10:00', '2019-10-02 03:15:00', '2019-08-31 15:54:25', '2019-08-31 15:54:25'),
('KJS-1-11-9', 'MNTR-1', 'MPL-11', 'MP-1-12-11-3', 'Quiz Biologi Kelas 12', 5, '2019-08-22 11:58:00', '2019-10-01 10:10:00', '2019-08-31 16:06:09', '2019-08-31 16:06:09'),
('KJS-1-12-5', 'MNTR-1', 'MPL-12', 'MP-1-11-12-2', 'Quiz Kimia kelas 11', 5, '2019-09-26 14:10:00', '2019-10-22 02:00:00', '2019-08-31 15:32:21', '2019-08-31 15:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(25) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kelas`) VALUES
('KLS-10', '10'),
('KLS-11', '11'),
('KLS-12', '12');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_student`
--

CREATE TABLE `kelas_student` (
  `kode_kelas_student` varchar(25) NOT NULL,
  `kode_kategori_kelas` varchar(25) NOT NULL,
  `kode_kelas` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`username`, `password`) VALUES
('master', '$2y$10$UjCwlB90V3.JmFbbloXAvuVImfqeW3J2xOU/m5p5PTdTvtri3Mypy');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kode_materi` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mentor` varchar(25) CHARACTER SET latin1 NOT NULL,
  `kode_mentor_pelajaran` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `kode_mapel` varchar(25) CHARACTER SET latin1 NOT NULL,
  `judul_materi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diupdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kode_materi`, `id_mentor`, `kode_mentor_pelajaran`, `kode_mapel`, `judul_materi`, `cover`, `materi`, `dibuat`, `diupdate`) VALUES
('MTRI-1-10-2', 'MNTR-1', 'MP-1-10-10-1', 'MPL-10', 'Materi 1', '1567281472_Screenshot from 2019-08-28 15-35-53.png', 'Materi pertama fisika<br>', '2019-08-31 19:57:52', '2019-08-31 19:57:52'),
('MTRI-1-10-3', 'MNTR-1', 'MP-1-10-10-1', 'MPL-10', 'Materi fisika ke 2', '1567281798_Screenshot from 2019-08-30 15-49-15.png', 'materi fisika ke dua kelas 10<br>', '2019-08-31 20:03:18', '2019-08-31 20:03:18'),
('MTRI-1-10-7', 'MNTR-1', 'MP-1-12-10-4', 'MPL-10', 'Materi biologi ke 1 kelas 12', '1567282166_Screenshot from 2019-08-28 15-35-53.png', 'Materi biologi ke 1 kelas 12<br>', '2019-08-31 20:09:26', '2019-08-31 20:09:26'),
('MTRI-1-11-4', 'MNTR-1', 'MP-1-10-11-4', 'MPL-11', 'Materi biologi ke 1 kelas 10', '1567281837_Screenshot from 2019-08-27 22-13-27.png', 'Materi biologi ke 1 kelas 10<br>', '2019-08-31 20:03:57', '2019-08-31 20:03:57'),
('MTRI-1-11-5', 'MNTR-1', 'MP-1-11-11-4', 'MPL-11', 'Materi biologi ke 1 kelas 11', '1567281900_Screenshot from 2019-08-30 15-49-15.png', 'Materi biologi ke 1 kelas 11<br>', '2019-08-31 20:05:00', '2019-08-31 20:05:00'),
('MTRI-1-11-7', 'MNTR-1', 'MP-1-12-11-3', 'MPL-11', 'Materi biologi ke 1 kelas 12 tess', '1567282363_ss-temp1.png', 'Materi biologi ke 1 kelas 12<br>', '2019-08-31 20:09:04', '2019-08-31 20:12:43'),
('MTRI-1-12-6', 'MNTR-1', 'MP-1-11-12-2', 'MPL-12', 'Materi kimia ke 1 kelas 11', '1567281934_Screenshot from 2019-08-27 22-13-27.png', 'Materi kimia ke 1 kelas 11<br>', '2019-08-31 20:05:34', '2019-08-31 20:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id_mentor` varchar(25) NOT NULL,
  `name` varchar(191) NOT NULL,
  `foto` varchar(191) NOT NULL DEFAULT 'user/mentor_default.jpg',
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `email_verified_at` varchar(191) DEFAULT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id_mentor`, `name`, `foto`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('MNTR-1', 'wahyu chandra nugroho', '1564278138_guru.jpeg', 'wahyuchandra1109@gmail.com', '$2y$10$YJzOVIiEFgjtAd58XRRZqOgBie2IMkcVbBXP9vCDcn.pOJfDUpd3G', '2019-07-27 01:48:07', 'm1r4AhAGOGQD9vb8JTI9hkTPlTcTJKNRn5yDZmlKiBr0ZYkqpRTLVXJCDnvu', '2019-07-28 02:01:17', '2019-07-27 18:42:18'),
('MNTR-2', 'Mozart E-learning', '1564278237_guru2.jpg', 'mozzartwolfgang@gmail.com', '$2y$10$xv6Z6fci6Kj./zjLA8XpwOj5U00/a8aErha2Rii1KOeLb/e/QX6tK', NULL, NULL, '2019-07-28 01:43:57', '2019-07-27 18:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_pelajaran`
--

CREATE TABLE `mentor_pelajaran` (
  `kode_mentor_pelajaran` varchar(30) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `kuota` int(10) NOT NULL DEFAULT 30,
  `kode_mapel` varchar(25) NOT NULL,
  `kode_kelas` varchar(25) NOT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_pelajaran`
--

INSERT INTO `mentor_pelajaran` (`kode_mentor_pelajaran`, `id_mentor`, `kuota`, `kode_mapel`, `kode_kelas`, `tanggal_buat`) VALUES
('MP-1-10-10-1', 'MNTR-1', 1, 'MPL-10', 'KLS-10', '2019-09-01 20:08:49'),
('MP-1-10-11-4', 'MNTR-1', 30, 'MPL-11', 'KLS-10', '2019-08-31 08:14:31'),
('MP-1-11-11-4', 'MNTR-1', 30, 'MPL-11', 'KLS-11', '2019-08-31 15:19:41'),
('MP-1-11-12-2', 'MNTR-1', 34, 'MPL-12', 'KLS-11', '2019-09-01 11:57:23'),
('MP-1-12-10-4', 'MNTR-1', 30, 'MPL-10', 'KLS-12', '2019-08-31 08:00:04'),
('MP-1-12-11-3', 'MNTR-1', 33, 'MPL-11', 'KLS-12', '2019-08-31 15:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_student`
--

CREATE TABLE `mentor_student` (
  `kode_mentor_student` varchar(25) NOT NULL,
  `kode_mentor_pelajaran` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `tanggal_mengikuti` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_student`
--

INSERT INTO `mentor_student` (`kode_mentor_student`, `kode_mentor_pelajaran`, `id_mentor`, `id_student`, `tanggal_mengikuti`) VALUES
('KMS-1-2-2', 'MP-1-11-11-4', 'MNTR-1', 'STD-2', '2019-09-01 20:33:18'),
('KMS-1-3-3', 'MP-1-11-12-2', 'MNTR-1', 'STD-3', '2019-09-01 20:33:23'),
('MS-2-3-7', 'MP-1-11-12-2', 'MNTR-1', 'STD-1', '2019-09-01 20:54:06'),
('MS-2-5-5', 'MP-1-10-11-4', 'MNTR-1', 'STD-1', '2019-09-01 20:51:25'),
('MS-2-5-6', 'MP-1-11-11-4', 'MNTR-1', 'STD-1', '2019-09-01 20:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_06_20_044229_create_materi_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` varchar(25) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `nilai` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_selesai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wa@gmail.com', '$2y$10$8Y6XU4S1/D3MGTNt.fNCCeBC966BgDECzg3GgoEY5TRRyW7DHqVQ2', '2019-07-18 22:52:06'),
('wahyuchandra1109@gmail.com', '$2y$10$ibO3fsrOYUqwQbxepoUEReS.XKF2Q2ZXrdoTf/HD5V4Z3N/SoPZoy', '2019-07-27 19:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `kode_mapel` varchar(25) NOT NULL,
  `nama_pelajaran` varchar(191) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diupdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`kode_mapel`, `nama_pelajaran`, `dibuat`, `diupdate`) VALUES
('MPL-10', 'Fisika', '2019-08-30 22:42:32', '2019-08-30 22:42:32'),
('MPL-11', 'Biologi', '2019-08-30 22:42:45', '2019-08-30 22:42:45'),
('MPL-12', 'Kimia', '2019-08-30 22:45:56', '2019-08-30 22:45:56'),
('MPL-13', 'Sejarah', '2019-08-30 22:46:14', '2019-08-30 22:46:14'),
('MPL-14', 'Geografi', '2019-08-30 22:46:22', '2019-08-30 22:46:22'),
('MPL-15', 'Ekonomi', '2019-08-30 22:46:33', '2019-08-30 22:46:33'),
('MPL-16', 'Sosiologi', '2019-08-30 22:46:43', '2019-08-30 22:46:43'),
('MPL-17', 'Bahasa dan Sastra Indonesia', '2019-08-30 22:46:57', '2019-08-30 22:46:57'),
('MPL-18', 'Bahasa dan Sastra Inggris', '2019-08-30 22:47:08', '2019-08-30 22:47:08'),
('MPL-19', 'Antropologi', '2019-08-30 22:47:20', '2019-08-30 22:47:20'),
('MPL-2', 'Pendidikan Jasmani dan Kesehatan', '2019-08-31 04:52:37', '2019-08-30 21:48:07'),
('MPL-3', 'Pendidikan Agama & Budi Pekerti', '2019-08-30 08:39:22', '2019-08-30 08:39:22'),
('MPL-4', 'Pendidikan Kewarganegaraan', '2019-08-30 08:39:36', '2019-08-30 08:39:36'),
('MPL-5', 'Bahasa Indonesia', '2019-08-30 08:39:48', '2019-08-30 08:39:48'),
('MPL-6', 'Matematika', '2019-08-30 08:40:13', '2019-08-30 08:40:13'),
('MPL-7', 'Sejarah Indonesia', '2019-08-30 21:47:21', '2019-08-30 21:47:21'),
('MPL-8', 'Bahasa Inggris', '2019-08-30 21:47:38', '2019-08-30 21:47:38'),
('MPL-9', 'Seni Budaya', '2019-08-30 22:05:03', '2019-08-30 22:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `kode_soal` varchar(30) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `pertanyaan` longtext DEFAULT NULL,
  `pilihan1` varchar(191) DEFAULT NULL,
  `pilihan2` varchar(191) DEFAULT NULL,
  `pilihan3` varchar(191) DEFAULT NULL,
  `pilihan4` varchar(191) DEFAULT NULL,
  `pilihan5` varchar(191) DEFAULT NULL,
  `pilihan_benar` varchar(191) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`kode_soal`, `kode_judul_soal`, `pertanyaan`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `pilihan_benar`) VALUES
('SOAL-1-10', 'KJS-1-11-4', '<p>Pertanyaan 1<br></p>', '11', '12', '13', '14', '15', ''),
('SOAL-1-11', 'KJS-1-11-6', '', '', '', '', '', '', ''),
('SOAL-1-12', 'KJS-1-11-6', '', '', '', '', '', '', ''),
('SOAL-1-13', 'KJS-1-11-6', '', '', '', '', '', '', ''),
('SOAL-1-14', 'KJS-1-11-6', '', '', '', '', '', '', ''),
('SOAL-1-15', 'KJS-1-11-6', '', '', '', '', '', '', ''),
('SOAL-1-16', 'KJS-1-10-6', '', '', '', '', '', '', ''),
('SOAL-1-17', 'KJS-1-10-6', '', '', '', '', '', '', ''),
('SOAL-1-18', 'KJS-1-10-6', '', '', '', '', '', '', ''),
('SOAL-1-19', 'KJS-1-10-6', '', '', '', '', '', '', ''),
('SOAL-1-20', 'KJS-1-10-6', '', '', '', '', '', '', ''),
('SOAL-1-21', 'KJS-1-10-7', '', '', '', '', '', '', ''),
('SOAL-1-22', 'KJS-1-10-7', '', '', '', '', '', '', ''),
('SOAL-1-23', 'KJS-1-10-7', '', '', '', '', '', '', ''),
('SOAL-1-24', 'KJS-1-10-7', '', '', '', '', '', '', ''),
('SOAL-1-25', 'KJS-1-10-7', '', '', '', '', '', '', ''),
('SOAL-1-26', 'KJS-1-10-8', '', '', '', '', '', '', ''),
('SOAL-1-27', 'KJS-1-10-8', '', '', '', '', '', '', ''),
('SOAL-1-28', 'KJS-1-10-8', '', '', '', '', '', '', ''),
('SOAL-1-29', 'KJS-1-10-8', '', '', '', '', '', '', ''),
('SOAL-1-30', 'KJS-1-10-8', '', '', '', '', '', '', ''),
('SOAL-1-31', 'KJS-1-11-9', '', '', '', '', '', '', ''),
('SOAL-1-32', 'KJS-1-11-9', '', '', '', '', '', '', ''),
('SOAL-1-33', 'KJS-1-11-9', '', '', '', '', '', '', ''),
('SOAL-1-34', 'KJS-1-11-9', '', '', '', '', '', '', ''),
('SOAL-1-35', 'KJS-1-11-9', '', '', '', '', '', '', ''),
('SOAL-1-6', 'KJS-1-11-4', '<p>pertanyaan 2<br></p>', '21', '22', '23', '24', '25', '2'),
('SOAL-1-7', 'KJS-1-11-4', '<p>pertanyaan 3<br></p>', '31', '32', '33', '34', '35', '3'),
('SOAL-1-8', 'KJS-1-11-4', '<p>pertanyaan 4<br></p>', '41', '42', '43', '44', '45', '4'),
('SOAL-1-9', 'KJS-1-11-4', '<p>pertanyaan 5<br></p>', '51', '52', '53', '54', '55', '5');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_student` varchar(25) NOT NULL,
  `socialite_id` varchar(255) DEFAULT NULL,
  `socialite_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `foto` varchar(191) DEFAULT 'user/user_default.png',
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `remember_token` varchar(191) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT current_timestamp(),
  `diupdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_student`, `socialite_id`, `socialite_name`, `name`, `foto`, `email`, `password`, `email_verified_at`, `remember_token`, `tanggal_daftar`, `diupdate`) VALUES
('STD-1', '110084344871768341865', 'google', 'wahyu chandra', '1564279151_el-rumi_20170704_202536.jpg', 'wahyuchandra1109@gmail.com', '$2y$10$YJzOVIiEFgjtAd58XRRZqOgBie2IMkcVbBXP9vCDcn.pOJfDUpd3G', '2019-09-01 12:10:36', 'W9tE7Jr0F05FQL2ztnU31WBNaI4t77qUsbCwMSdemfEqjCbpiBBaQtcXD0BX', '2019-07-27 07:45:26', '2019-07-27 18:59:11'),
('STD-2', '1611769428957729', 'facebook', 'Wahyu Chandra Nugroho', 'https://graph.facebook.com/v3.0/1611769428957729/picture?type=normal', 'wahyuchandra350@rocketmail.com', NULL, '2019-09-01 12:15:40', 'K6tK8WdifJYcYsiRhg0aZG9Q7q1DualJSO9tZ4OfdfDEW57aL04qaOKzSmP0', '2019-09-01 12:15:27', '2019-09-01 12:15:27'),
('STD-3', '113005454064787893692', 'google', 'Extra Ordinary Videos', 'https://lh3.googleusercontent.com/-VJ4_OQYV15E/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rel30Fb4edv9lePcHXSeGMinlKWyA/photo.jpg', 'wahyuchandra350@gmail.com', NULL, '2019-09-01 20:02:47', 'SWVjItlwX8LrJjHgVDAVY6bYveC9JC60NpYvr7A3Eg6zXwds8Kpf9XP8J25C', '2019-09-01 12:15:56', '2019-09-01 12:15:56'),
('STD-4', NULL, NULL, 'wahyu', 'user/user_default.png', 'mozzartwolfgang@gmail.com', '$2y$10$AtisZNV2RHEICn6wvjqaleu0BX7FZt7e8ghluHMjtyB2QgAaWMwiO', '2019-09-01 06:36:21', NULL, '2019-09-01 13:24:24', '2019-09-01 06:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `student_pelajaran`
--

CREATE TABLE `student_pelajaran` (
  `kode_student_pelajaran` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `kode_mapel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kode_hasil`),
  ADD KEY `fk_kode_judul_soal_hasil` (`kode_judul_soal`),
  ADD KEY `fk_id_student_hasil` (`id_student`);

--
-- Indexes for table `judul_soal`
--
ALTER TABLE `judul_soal`
  ADD PRIMARY KEY (`kode_judul_soal`),
  ADD KEY `fk_id_mentor_judul_soal` (`id_mentor`),
  ADD KEY `fk_kode_mentor_pelajaran_mentor_pelajaran_judu_soal` (`kode_mentor_pelajaran`),
  ADD KEY `fk_kode_mapel_judul_soal` (`kode_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`),
  ADD KEY `fk_id_mentor_materi` (`id_mentor`),
  ADD KEY `fk_kode_mentor_pelajaran_materi` (`kode_mentor_pelajaran`),
  ADD KEY `fk_kode_mapel_materi` (`kode_mapel`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indexes for table `mentor_pelajaran`
--
ALTER TABLE `mentor_pelajaran`
  ADD PRIMARY KEY (`kode_mentor_pelajaran`),
  ADD KEY `fk_id_mentor_mentor_student` (`id_mentor`),
  ADD KEY `fk_kode_mapel_mentor_pelajaran` (`kode_mapel`);

--
-- Indexes for table `mentor_student`
--
ALTER TABLE `mentor_student`
  ADD PRIMARY KEY (`kode_mentor_student`),
  ADD KEY `fk_kode_mentor_pelajaran_mentor_student` (`kode_mentor_pelajaran`),
  ADD KEY `fk_id_student_mentor_student` (`id_student`),
  ADD KEY `id_mentor` (`id_mentor`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `fk_kode_judul_soal_nilai` (`kode_judul_soal`),
  ADD KEY `fk_id_student_nilai` (`id_student`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`kode_soal`),
  ADD KEY `fk_kode_judul_soal_soal` (`kode_judul_soal`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`);

--
-- Indexes for table `student_pelajaran`
--
ALTER TABLE `student_pelajaran`
  ADD PRIMARY KEY (`kode_student_pelajaran`),
  ADD KEY `fk_id_mentor_pelajaran_student` (`id_mentor`),
  ADD KEY `fk_id_student_pelajaran_student` (`id_student`),
  ADD KEY `fk_kode_mapel_pelajaran_student` (`kode_mapel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `fk_id_student_hasil` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_judul_soal_hasil` FOREIGN KEY (`kode_judul_soal`) REFERENCES `judul_soal` (`kode_judul_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `judul_soal`
--
ALTER TABLE `judul_soal`
  ADD CONSTRAINT `fk_id_mentor_judul_soal` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mapel_judul_soal` FOREIGN KEY (`kode_mapel`) REFERENCES `pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mentor_pelajaran_mentor_pelajaran_judu_soal` FOREIGN KEY (`kode_mentor_pelajaran`) REFERENCES `mentor_pelajaran` (`kode_mentor_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_id_mentor_materi` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mapel_materi` FOREIGN KEY (`kode_mapel`) REFERENCES `pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mentor_pelajaran_materi` FOREIGN KEY (`kode_mentor_pelajaran`) REFERENCES `mentor_pelajaran` (`kode_mentor_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentor_pelajaran`
--
ALTER TABLE `mentor_pelajaran`
  ADD CONSTRAINT `fk_id_mentor_mentor_student` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mapel_mentor_pelajaran` FOREIGN KEY (`kode_mapel`) REFERENCES `pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentor_student`
--
ALTER TABLE `mentor_student`
  ADD CONSTRAINT `fk_id_student_mentor_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mentor_pelajaran_mentor_student` FOREIGN KEY (`kode_mentor_pelajaran`) REFERENCES `mentor_pelajaran` (`kode_mentor_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_mentor` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_id_student_nilai` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_judul_soal_nilai` FOREIGN KEY (`kode_judul_soal`) REFERENCES `judul_soal` (`kode_judul_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `fk_kode_judul_soal_soal` FOREIGN KEY (`kode_judul_soal`) REFERENCES `judul_soal` (`kode_judul_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_pelajaran`
--
ALTER TABLE `student_pelajaran`
  ADD CONSTRAINT `fk_id_mentor_pelajaran_student` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_student_pelajaran_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mapel_pelajaran_student` FOREIGN KEY (`kode_mapel`) REFERENCES `pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
