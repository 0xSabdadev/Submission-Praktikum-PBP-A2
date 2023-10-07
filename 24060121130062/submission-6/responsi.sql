-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 07:58 PM
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
-- Database: `responsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabs`
--

CREATE TABLE `tb_kabs` (
  `kode_kab` varchar(255) NOT NULL,
  `kode_prov` varchar(255) NOT NULL,
  `nama_kab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kabs`
--

INSERT INTO `tb_kabs` (`kode_kab`, `kode_prov`, `nama_kab`) VALUES
('k1', 'p1', 'Jakarta Barat'),
('k10', 'p3', 'Pekalongan'),
('k11', 'p3', 'Kudus'),
('k12', 'p4', 'Pangkal Pinang'),
('k2', 'p1', 'Jakarta Selatan'),
('k3', 'p1', 'Jakarta Pusat'),
('k4', 'p2', 'Bandung'),
('k5', 'p2', 'Bogor'),
('k6', 'p2', 'Bekasi'),
('k7', 'p2', 'Cirebon'),
('k8', 'p3', 'Semarang'),
('k9', 'p3', 'Wonogiri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provs`
--

CREATE TABLE `tb_provs` (
  `kode_prov` varchar(255) NOT NULL,
  `nama_prov` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_provs`
--

INSERT INTO `tb_provs` (`kode_prov`, `nama_prov`) VALUES
('p1', 'Jakarta'),
('p2', 'Jawa Barat'),
('p3', 'Jawa Tengah'),
('p4', 'Bangka Belitung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kode_prov` varchar(255) NOT NULL,
  `kode_kab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `jenis_kelamin`, `alamat`, `kode_prov`, `kode_kab`) VALUES
(111, 'Mulya Irwansyah', 'mulya@gmail.com', 'laki-laki', 'Perumahan Villa Tembalang Blok i No. 2', 'p3', 'k8'),
(112, 'Faiq', 'faiq@gmail.com', 'laki-laki', 'Bintaro', 'p2', 'k5'),
(113, 'Nadine', 'nadine@gmail.com', 'perempuan', 'pasar raya', 'p4', 'k12'),
(114, 'popol', 'popol@gmail.com', 'laki-laki', 'gondang', 'p3', 'k8'),
(115, 'Varrel', 'varrel@gmail.com', 'laki-laki', 'Taman Kencana', 'p1', 'k1'),
(122, 'pol', 'pol@gmail.com', 'laki-laki', 'raya raya', 'p3', 'k9'),
(123, 'gol', 'gol@gmail.com', 'laki-laki', 'Santika', 'p1', 'k2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD PRIMARY KEY (`kode_kab`),
  ADD KEY `kode_prov` (`kode_prov`);

--
-- Indexes for table `tb_provs`
--
ALTER TABLE `tb_provs`
  ADD PRIMARY KEY (`kode_prov`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `kode_prov` (`kode_prov`),
  ADD KEY `kode_kab` (`kode_kab`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD CONSTRAINT `fk_tb_provs_kode_prov1` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_tb_kabs_kode_kab` FOREIGN KEY (`kode_kab`) REFERENCES `tb_kabs` (`kode_kab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_provs_kode_prov` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
