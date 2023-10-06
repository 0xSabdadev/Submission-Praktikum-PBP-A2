-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 12:00 PM
-- Server version: 8.0.29
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
  `nama_kab` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kabs`
--

INSERT INTO `tb_kabs` (`kode_kab`, `kode_prov`, `nama_kab`) VALUES
('JAWA1A', 'JAWA1', 'Kota Tangerang'),
('JAWA1B', 'JAWA1', 'Kabupaten Tangerang'),
('JAWA1C', 'JAWA1', 'Kabupaten Pandeglang'),
('JAWA1D', 'JAWA1', 'Kabupaten Serang'),
('JAWA1E', 'JAWA1', 'Kabupaten Lebak'),
('JAWA1F', 'JAWA1', 'Kabupaten Cilegon'),
('JAWA2A', 'JAWA2', 'Jakarta Pusat'),
('JAWA2B', 'JAWA2', 'Jakarta Barat'),
('JAWA2C', 'JAWA2', 'Jakarta Selatan'),
('JAWA2D', 'JAWA2', 'Jakarta Utara'),
('JAWA2E', 'JAWA2', 'Jakarta Seribu'),
('JAWA3A', 'JAWA3', 'Kabupaten Kuningan'),
('JAWA3B', 'JAWA3', 'Kota Cirebon'),
('JAWA3C', 'JAWA3', 'Kota Depok'),
('JAWA3D', 'JAWA3', 'Kabupaten Bogor'),
('JAWA3F', 'JAWA3', 'Kota Bandung'),
('JAWA4A', 'JAWA4', 'Sleman'),
('JAWA4B', 'JAWA4', 'Kulonprogo'),
('JAWA4C', 'JAWA4', 'Gunung Kidul'),
('JAWA4D', 'JAWA4', 'Kabupaten Bantul'),
('JAWA4E', 'JAWA4', 'Kota Yogyakarta'),
('JAWA5A', 'JAWA5', 'Kota Tegal'),
('JAWA5B', 'JAWA5', 'Kota Salatiga'),
('JAWA5C', 'JAWA5', 'Kota Pekalongan'),
('JAWA5D', 'JAWA5', 'Kota Pekalongan'),
('JAWA5E', 'JAWA5', 'Kabupaten Tegal'),
('JAWA5F', 'JAWA5', 'Kota Semarang'),
('JAWA6A', 'JAWA6', 'Kota Pasuruan'),
('JAWA6B', 'JAWA6', 'Kota Malang'),
('JAWA6C', 'JAWA6', 'Kota Blitar'),
('JAWA6D', 'JAWA6', 'Kota Madiun'),
('JAWA6E', 'JAWA6', 'Kabupaten Nganjuk'),
('JAWA6F', 'JAWA6', 'Kota Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provs`
--

CREATE TABLE `tb_provs` (
  `kode_prov` varchar(255) NOT NULL,
  `nama_prov` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_provs`
--

INSERT INTO `tb_provs` (`kode_prov`, `nama_prov`) VALUES
('JAWA1', 'Banten'),
('JAWA2', 'DKI Jakarta'),
('JAWA3', 'Jawa Barat'),
('JAWA4', 'Yogyakarta'),
('JAWA5', 'Jawa Tengah'),
('JAWA6', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kode_prov` varchar(255) NOT NULL,
  `kode_kab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `jenis_kelamin`, `alamat`, `kode_prov`, `kode_kab`) VALUES
(1, 'Duma Mora', 'duma@user.com', 'perempuan', 'Jl. Prof. Sodarto No16', 'JAWA1', 'JAWA1D'),
(2, 'Tiara Fitra', 'tiara@user.com', 'perempuan', 'JL. Jurang Belimbing', 'JAWA2', 'JAWA2C'),
(3, 'Zida Amalia', 'zida@user.com', 'perempuan', 'Jl. Matahari Raya', 'JAWA6', 'JAWA6E'),
(4, 'Shendira Widya', 'wadya@user.com', 'perempuan', 'JL. Muria Kurnia Blok A No. 24', 'JAWA4', 'JAWA4E'),
(5, 'Sulastri Silvana', 'lastri@user.com', 'perempuan', 'Jl. Sutomo No.12', 'JAWA6', 'JAWA6C'),
(6, 'Kinara Sinaga', 'nara@user.com', 'perempuan', 'Jl. Sisimangaraja 14', 'JAWA2', 'JAWA2D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD PRIMARY KEY (`kode_kab`),
  ADD KEY `FK_kode_prov_tb_kabs` (`kode_prov`);

--
-- Indexes for table `tb_provs`
--
ALTER TABLE `tb_provs`
  ADD PRIMARY KEY (`kode_prov`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`,`email`),
  ADD KEY `FK_kode_prov` (`kode_prov`),
  ADD KEY `FK_kode_kab` (`kode_kab`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD CONSTRAINT `FK_kode_prov_tb_kabs` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `FK_kode_kab` FOREIGN KEY (`kode_kab`) REFERENCES `tb_kabs` (`kode_kab`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_kode_prov` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
