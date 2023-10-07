-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 07, 2023 at 11:17 AM
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
('BALI01', 'BALI', 'Kabupaten Badung'),
('JAMBI01', 'JAMBI', 'Kabupaten Muaro Jambi'),
('JATIM01', 'JATIM', 'Kabupaten Malang'),
('KALSEL01', 'KALSEL', 'Kabupaten Banjar'),
('KALTENG01', 'KALTENG', 'Kabupaten Palangka Raya'),
('LAMPUNG01', 'LAMPUNG', 'Kabupaten Lampung Selatan'),
('NTB01', 'NTB', 'Kabupaten Lombok Barat'),
('PAPUA01', 'PAPUA', 'Kabupaten Jayapura'),
('SULTRA01', 'SULTRA', 'Kabupaten Kendari'),
('SUMSEL01', 'SUMSEL', 'Kabupaten Ogan Komering Ulu');

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
('BALI', 'Bali'),
('JAMBI', 'Jambi'),
('JATIM', 'Jawa Timur'),
('KALSEL', 'Kalimantan Selatan'),
('KALTENG', 'Kalimantan Tengah'),
('LAMPUNG', 'Lampung'),
('NTB', 'Nusa Tenggara Barat'),
('PAPUA', 'Papua'),
('SULTRA', 'Sulawesi Tenggara'),
('SUMSEL', 'Sumatera Selatan');

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
(1, 'Andi', 'andi@gmail.com', 'laki-laki', 'Jl. Pahlawan No. 123, Kel. Sumber Sari, Kec. Malang, Kabupaten Malang, JATIM', 'JATIM', 'JATIM01'),
(2, 'Rita', 'rita@gmail.com', 'perempuan', 'Jl. Kapuas No. 45, Kel. Tjilik Riwut, Kec. Palangka Raya, Kabupaten Palangka Raya, KALTENG', 'KALTENG', 'KALTENG01'),
(3, 'Budi', 'budi@gmail.com', 'laki-laki', 'Jl. Merdeka No. 67, Kel. Ogan Ilir, Kec. Palembang, Kabupaten Ogan Komering Ulu, SUMSEL', 'SUMSEL', 'SUMSEL01'),
(4, 'Siti', 'siti@gmail.com', 'perempuan', 'Jl. Raya Senggigi No. 89, Kel. Batu Layar, Kec. Lombok Barat, Kabupaten Lombok Barat, NTB', 'NTB', 'NTB01'),
(5, 'Joko', 'joko@gmail.com', 'laki-laki', 'Jl. Jayawijaya No. 34, Kel. Hamadi, Kec. Jayapura Utara, Kabupaten Jayapura, PAPUA', 'PAPUA', 'PAPUA01'),
(6, 'Dewi', 'dewi@gmail.com', 'perempuan', 'Jl. Ahmad Yani No. 12, Kel. Karet, Kec. Banjar, Kabupaten Banjar, KALSEL', 'KALSEL', 'KALSEL01'),
(7, 'Putra', 'putra@gmail.com', 'laki-laki', 'Jl. Pantai Kuta No. 56, Kel. Kuta, Kec. Badung, Kabupaten Badung, BALI', 'BALI', 'BALI01'),
(8, 'Lina', 'lina@gmail.com', 'perempuan', 'Jl. Teuku Umar No. 78, Kel. Baruga, Kec. Kendari, Kabupaten Kendari, SULTRA', 'SULTRA', 'SULTRA01'),
(9, 'Eko', 'eko@gmail.com', 'laki-laki', 'Jl. Zainal Abidin No. 23, Kel. Kalianda, Kec. Lampung Selatan, Kabupaten Lampung Selatan, LAMPUNG', 'LAMPUNG', 'LAMPUNG01'),
(10, 'Ardian Fajar Widyaputra', 'arfas8019@gmail.com', '', 'Klipang', 'SULTRA', 'SULTRA01'),
(11, 'Ardian Fajar Widyaputra', 'apulh2@gmail.com', '', 'Klipang', 'PAPUA', 'PAPUA01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD PRIMARY KEY (`kode_kab`),
  ADD KEY `FK_KAB_PROV` (`kode_prov`);

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
  ADD KEY `FK_PROV` (`kode_prov`),
  ADD KEY `FK_KAB` (`kode_kab`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD CONSTRAINT `FK_KAB_PROV` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `FK_KAB` FOREIGN KEY (`kode_kab`) REFERENCES `tb_kabs` (`kode_kab`),
  ADD CONSTRAINT `FK_PROV` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
