-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 11:49 AM
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
('11.01', '11', 'Kabupaten Aceh Selatan'),
('11.02', '11', 'Kabupaten Aceh Tenggara'),
('11.03', '11', 'Kabupaten Aceh Timur'),
('33.08', '33', 'Kabupaten Magelang'),
('33.22', '33', 'Kabupaten Semarang'),
('33.26', '33', 'Kabupaten Pekalongan'),
('92.01', '92', 'Kabupaten Sorong'),
('92.03', '92', 'Kabupaten Fak Fak'),
('92.05', '92', 'Kabupaten Raja Ampat');

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
('11', 'Aceh'),
('33', 'Jawa Tengah'),
('92', 'Papua Barat');

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
(1, 'tika', 'praktikumpbp@informatika.com', 'Laki-laki', 'jalan jalan No. 99', '11', '11.01'),
(32, 'xaxaxa', 'praktikumaja@informatika.com', 'Laki-laki', 'jalan jalan No. 99', '33', '33.22'),
(33, 'cobain', 'cobain@gmail.com', 'Laki-laki', 'jalan jalan No. 99', '11', '11.01'),
(34, 'hai', 'praktikumini@gmail.com', 'Laki-laki', 'jalan yang benar no.77', '33', '33.22'),
(35, 'caca', 'cobalagi@gmail.com', 'Perempuan', 'jalan benar no.100', '92', '92.03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD PRIMARY KEY (`kode_kab`),
  ADD KEY `FK_kode_prov_tb_provs` (`kode_prov`);

--
-- Indexes for table `tb_provs`
--
ALTER TABLE `tb_provs`
  ADD PRIMARY KEY (`kode_prov`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_kode_prov_kode_prov` (`kode_prov`),
  ADD KEY `FK_kode_kab_kode_kab` (`kode_kab`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD CONSTRAINT `FK_kode_prov_tb_provs` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `FK_kode_kab_kode_kab` FOREIGN KEY (`kode_kab`) REFERENCES `tb_kabs` (`kode_kab`),
  ADD CONSTRAINT `FK_kode_prov_kode_prov` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
