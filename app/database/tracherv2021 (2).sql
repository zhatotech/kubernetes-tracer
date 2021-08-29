-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 07:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracherv2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(11) NOT NULL,
  `id_registrasi_mahasiswa` varchar(225) NOT NULL,
  `id_mahasiswa` varchar(225) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_mahasiswa` varchar(225) NOT NULL,
  `id_prodi` varchar(225) NOT NULL,
  `nama_program_studi` varchar(30) NOT NULL,
  `id_periode_masuk` int(11) NOT NULL,
  `nama_periode_masuk` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(20) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `created_at` date DEFAULT NULL,
  `edited_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `id_registrasi_mahasiswa`, `id_mahasiswa`, `nim`, `handphone`, `email`, `nama_mahasiswa`, `id_prodi`, `nama_program_studi`, `id_periode_masuk`, `nama_periode_masuk`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_agama`, `nama_agama`, `nik`, `created_at`, `edited_at`) VALUES
(2, 'd833c81e-b3cf-4c44-9518-cf5b058ac7e6', 'd8b913bc-a7e1-4405-8624-865fd1d4b084', '081601005', '085756794209', 'waodeyulianti.hukum.umb@gmail.', 'WA ODE YULIANTI', '00895ee7-d8bb-4a5c-bc82-e0537866fb65', 'S1 Ilmu Hukum', 20161, '2016/2017 Ganjil', 'P', 'WARURUMA', '1997-02-28', 1, 'Islam', '7472056802970002', '2021-07-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `info_pt`
--

CREATE TABLE `info_pt` (
  `id_info_pt` int(11) NOT NULL,
  `nama_info_pt` varchar(114) DEFAULT NULL,
  `kode_pt` varchar(114) DEFAULT NULL,
  `img_header` varchar(114) DEFAULT NULL,
  `kontak_1` varchar(114) DEFAULT NULL,
  `kontak_2` varchar(114) DEFAULT NULL,
  `kontak_3` varchar(114) DEFAULT NULL,
  `kontak_4` varchar(114) DEFAULT NULL,
  `alamat_pt` varchar(114) DEFAULT NULL,
  `slogan` varchar(114) DEFAULT NULL,
  `logo_pt` varchar(114) DEFAULT NULL,
  `logo_kecil_pt` varchar(114) DEFAULT NULL,
  `header_pt` varchar(114) NOT NULL,
  `angkatan` varchar(11) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `gelombang` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `pengunjung` int(20) NOT NULL,
  `batas_bayar` int(11) NOT NULL,
  `userfeeder` varchar(20) DEFAULT NULL,
  `passfeeder` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_pt`
--

INSERT INTO `info_pt` (`id_info_pt`, `nama_info_pt`, `kode_pt`, `img_header`, `kontak_1`, `kontak_2`, `kontak_3`, `kontak_4`, `alamat_pt`, `slogan`, `logo_pt`, `logo_kecil_pt`, `header_pt`, `angkatan`, `tahun`, `gelombang`, `biaya`, `pengunjung`, `batas_bayar`, `userfeeder`, `passfeeder`) VALUES
(1, 'Tracer Study - Universitas Muhammdiyah Buton', 'Tracher', NULL, '085796697665', '085395490400', '085241706725', '085241706725', 'Jalan Betoambari', 'kampus hijau', 'tracher-study-universitas-muhammdiyah-buton-20210630-040637.png', 'logo-lpm-lembaga-penjaminan-mutu-umbuton-20210421-190433.png', 'header-2017-01-26-1485405736.png', '2021', 21, 2, 150000, 0, 24, '091032', '147852369');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_mhs`
--

CREATE TABLE `jawaban_mhs` (
  `id_jawaban` int(11) NOT NULL,
  `id_periode_t` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `id_opsi` int(11) NOT NULL,
  `type_opsi` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_edit` int(11) NOT NULL,
  `text_opsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `opsi_pertanyaan`
--

CREATE TABLE `opsi_pertanyaan` (
  `id_opsi` int(11) NOT NULL,
  `id_periode_t` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `nm_opsi` varchar(11) NOT NULL,
  `isi_opsi` text NOT NULL,
  `kunci_opsi` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_edit` int(11) NOT NULL,
  `opsi_lainnya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opsi_pertanyaan`
--

INSERT INTO `opsi_pertanyaan` (`id_opsi`, `id_periode_t`, `id_pertanyaan`, `nm_opsi`, `isi_opsi`, `kunci_opsi`, `created_at`, `edited_at`, `user_create`, `user_edit`, `opsi_lainnya`) VALUES
(2, 1, 2, 'b', 'Tidak seusai dengan jurusan saya', 0, '2021-07-08 07:09:05', '0000-00-00 00:00:00', 1, 1, 0),
(3, 1, 2, 'c', 'Tidak tahu', 0, '2021-07-08 07:09:11', '0000-00-00 00:00:00', 1, 1, 0),
(4, 1, 2, 'a', 'Ya sesuai dengan jurusan saya', 1, '2021-07-08 07:31:51', '0000-00-00 00:00:00', 1, 1, 0),
(5, 1, 1, 'a', 'Sesuai tes', 0, '2021-07-08 07:32:57', '0000-00-00 00:00:00', 1, 1, 0),
(6, 1, 1, 'b', 'tidak sesuai tes', 1, '2021-07-08 07:34:05', '0000-00-00 00:00:00', 1, 1, 0),
(7, 1, 1, 'c', 'Pilihan lainnya', 0, '2021-07-08 07:34:32', '0000-00-00 00:00:00', 1, 1, 1),
(8, 1, 3, 'a', 'masih', 1, '2021-07-08 07:54:40', '0000-00-00 00:00:00', 1, 1, 0),
(9, 1, 4, 'a', '1 - 3 Bulan', 1, '2021-07-08 08:01:59', '0000-00-00 00:00:00', 1, 1, 0),
(10, 1, 4, 'b', '4 - 5 Bulan', 0, '2021-07-08 08:02:13', '0000-00-00 00:00:00', 1, 1, 0),
(11, 1, 4, 'c', '6 - 10 Bulan', 0, '2021-07-08 08:02:27', '0000-00-00 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `kode_periode` varchar(20) NOT NULL,
  `nm_periode` varchar(224) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `periode_tracer`
--

CREATE TABLE `periode_tracer` (
  `id_periode_t` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `nm_periode` varchar(225) NOT NULL,
  `jml_mahasiswa` int(11) NOT NULL,
  `status_t` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  `user_create` int(11) NOT NULL,
  `user_edit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_tracer`
--

INSERT INTO `periode_tracer` (`id_periode_t`, `tahun`, `periode`, `nm_periode`, `jml_mahasiswa`, `status_t`, `created_at`, `edited_at`, `user_create`, `user_edit`) VALUES
(1, 2020, 1, 'Tracer Studi Tahun 2020/2021 Periode I', 0, 1, '2021-07-06 06:30:46', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_periode_t` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kd_pertanyaan` varchar(20) NOT NULL,
  `nm_pertanyaan` text NOT NULL,
  `type_opsi` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime DEFAULT NULL,
  `user_create` int(11) NOT NULL,
  `user_edit` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_periode_t`, `no_urut`, `kd_pertanyaan`, `nm_pertanyaan`, `type_opsi`, `created_at`, `edited_at`, `user_create`, `user_edit`, `status`) VALUES
(1, 1, 1, 'kp000001', 'tes', 1, '2021-07-06 13:34:16', NULL, 1, 1, 1),
(2, 1, 2, 'kp000002', 'Apakah Sesuai dengan Pekerjaan anda saat ini?', 1, '2021-07-08 05:08:43', NULL, 1, 1, 1),
(3, 1, 3, 'kp000003', 'Masih bekerja apa tidak', 1, '2021-07-08 07:53:36', NULL, 1, 1, 1),
(4, 1, 4, 'kp000004', 'Sejak lulus butuh berapa bulan hingga mendapatkan pekerjaan?', 1, '2021-07-08 08:01:17', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL,
  `kode_tahun` int(11) NOT NULL,
  `nm_tahun` varchar(224) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type_pertanyaan`
--

CREATE TABLE `type_pertanyaan` (
  `id_type` int(11) NOT NULL,
  `kd_type` varchar(20) NOT NULL,
  `nm_type` varchar(50) NOT NULL,
  `ket_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_pertanyaan`
--

INSERT INTO `type_pertanyaan` (`id_type`, `kd_type`, `nm_type`, `ket_type`) VALUES
(1, '01', 'Pilihan Ganda', 'Pilihan Ganda'),
(2, '02', 'Essay', 'Essay'),
(3, '03', 'Isian', 'isian');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `id_registrasi_mahasiswa` varchar(225) DEFAULT NULL,
  `id_mahasiswa` varchar(225) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(225) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `id_registrasi_mahasiswa`, `id_mahasiswa`, `username`, `password`, `repassword`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `lvl`) VALUES
(1, '127.0.0.1', NULL, NULL, 'administrator', '$2y$12$uu1zQ.5PFhIqHSylJ2im3uHWzFPapshCCiSk6mNQC7Pl.i.SNIA4m', 'password', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1626142881, 1, 'Admin', 'istrator', 'ADMIN', '0', 0),
(7, '::1', 'd833c81e-b3cf-4c44-9518-cf5b058ac7e6', 'd8b913bc-a7e1-4405-8624-865fd1d4b084', '081601005', '$2y$10$NJFC11VpDxM5oPZrAHdZO.X8yUwXFeiyiid/F3DpYhIKy2pLYm9ki', 'trc0816010050748', 'waodeyulianti.hukum.umb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625456568, 1626404025, 1, 'WA ODE YULIANTI', 'Tracer Umbuton', 'Umbuton', '085756794209', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(8, 7, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_pt`
--
ALTER TABLE `info_pt`
  ADD PRIMARY KEY (`id_info_pt`);

--
-- Indexes for table `jawaban_mhs`
--
ALTER TABLE `jawaban_mhs`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opsi_pertanyaan`
--
ALTER TABLE `opsi_pertanyaan`
  ADD PRIMARY KEY (`id_opsi`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `periode_tracer`
--
ALTER TABLE `periode_tracer`
  ADD PRIMARY KEY (`id_periode_t`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `type_pertanyaan`
--
ALTER TABLE `type_pertanyaan`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `info_pt`
--
ALTER TABLE `info_pt`
  MODIFY `id_info_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jawaban_mhs`
--
ALTER TABLE `jawaban_mhs`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opsi_pertanyaan`
--
ALTER TABLE `opsi_pertanyaan`
  MODIFY `id_opsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode_tracer`
--
ALTER TABLE `periode_tracer`
  MODIFY `id_periode_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_pertanyaan`
--
ALTER TABLE `type_pertanyaan`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
