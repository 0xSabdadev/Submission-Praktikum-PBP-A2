-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 08:22 PM
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
  `kode_kab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_prov` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kabs`
--

INSERT INTO `tb_kabs` (`kode_kab`, `kode_prov`, `nama_kab`) VALUES
('0101', '01', 'Kabupaten Bogor'),
('0102', '01', 'Kabupaten Sukabumi'),
('0103', '01', 'Kabupaten Cianjur'),
('0104', '01', 'Kabupaten Bandung'),
('0105', '01', 'Kabupaten Garut'),
('0201', '02', 'Kabupaten Cirebon'),
('0202', '02', 'Kabupaten Indramayu'),
('0203', '02', 'Kabupaten Karawang'),
('0204', '02', 'Kabupaten Purwakarta'),
('0205', '02', 'Kabupaten Subang'),
('0301', '03', 'Kabupaten Banyuwangi'),
('0302', '03', 'Kabupaten Bondowoso'),
('0303', '03', 'Kabupaten Jember'),
('0304', '03', 'Kabupaten Situbondo'),
('0305', '03', 'Kabupaten Lumajang'),
('0401', '04', 'Kabupaten Sleman'),
('0402', '04', 'Kabupaten Bantul'),
('0403', '04', 'Kabupaten Gunungkidul'),
('0404', '04', 'Kabupaten Kulon Progo'),
('0405', '04', 'Kabupaten Magelang'),
('0501', '05', 'Kabupaten Gianyar'),
('0502', '05', 'Kabupaten Badung'),
('0601', '06', 'Kabupaten Deli Serdang'),
('0602', '06', 'Kabupaten Karo'),
('0603', '06', 'Kabupaten Simalungun'),
('0604', '06', 'Kabupaten Dairi'),
('0605', '06', 'Kabupaten Humbang Hasundutan'),
('0701', '07', 'Kabupaten Ogan Ilir'),
('0702', '07', 'Kabupaten Ogan Komering Ilir'),
('0703', '07', 'Kabupaten Lahat'),
('0704', '07', 'Kabupaten Musi Rawas'),
('0705', '07', 'Kabupaten Banyuasin'),
('0801', '08', 'Kabupaten Lampung Barat'),
('0802', '08', 'Kabupaten Tanggamus'),
('0803', '08', 'Kabupaten Tulang Bawang'),
('0804', '08', 'Kabupaten Pesawaran'),
('0805', '08', 'Kabupaten Pringsewu'),
('0901', '09', 'Kabupaten Aceh Besar'),
('0902', '09', 'Kabupaten Pidie'),
('0903', '09', 'Kabupaten Aceh Jaya'),
('0904', '09', 'Kabupaten Bireuen'),
('0905', '09', 'Kabupaten Aceh Utara'),
('1001', '10', 'Kabupaten Padang Pariaman'),
('1002', '10', 'Kabupaten Agam'),
('1003', '10', 'Kabupaten Lima Puluh Kota'),
('1004', '10', 'Kabupaten Tanah Datar'),
('1005', '10', 'Kabupaten Pasaman Barat'),
('1101', '11', 'Kabupaten Bengkulu Selatan'),
('1102', '11', 'Kabupaten Rejang Lebong'),
('1103', '11', 'Kabupaten Mukomuko'),
('1104', '11', 'Kabupaten Lebong'),
('1105', '11', 'Kabupaten Kaur'),
('1201', '12', 'Kabupaten Jambi'),
('1202', '12', 'Kabupaten Tanjung Jabung Barat'),
('1203', '12', 'Kabupaten Tanjung Jabung Timur'),
('1204', '12', 'Kabupaten Batang Hari'),
('1205', '12', 'Kabupaten Bungo'),
('1301', '13', 'Kabupaten Palembang'),
('1302', '13', 'Kabupaten Prabumulih'),
('1303', '13', 'Kabupaten Ogan Ilir'),
('1304', '13', 'Kabupaten Ogan Komering Ulu Selatan'),
('1305', '13', 'Kabupaten Ogan Komering Ulu Timur'),
('1401', '14', 'Kabupaten Bengkulu'),
('1402', '14', 'Kabupaten Rejang Lebong'),
('1403', '14', 'Kabupaten Mukomuko'),
('1404', '14', 'Kabupaten Lebong'),
('1405', '14', 'Kabupaten Kaur'),
('1501', '15', 'Kabupaten Lampung Selatan'),
('1502', '15', 'Kabupaten Lampung Tengah'),
('1503', '15', 'Kabupaten Lampung Utara'),
('1504', '15', 'Kabupaten Lampung Barat'),
('1505', '15', 'Kabupaten Lampung Timur'),
('1601', '16', 'Kabupaten Bangka'),
('1602', '16', 'Kabupaten Belitung'),
('1603', '16', 'Kabupaten Bangka Selatan'),
('1604', '16', 'Kabupaten Bangka Tengah'),
('1605', '16', 'Kabupaten Bangka Barat'),
('1701', '17', 'Kabupaten Karimun'),
('1702', '17', 'Kabupaten Bintan'),
('1703', '17', 'Kabupaten Natuna'),
('1704', '17', 'Kabupaten Lingga'),
('1705', '17', 'Kabupaten Kepulauan Anambas'),
('1801', '18', 'Kabupaten Bengkalis'),
('1802', '18', 'Kabupaten Indragiri Hilir'),
('1803', '18', 'Kabupaten Indragiri Hulu'),
('1804', '18', 'Kabupaten Pelalawan'),
('1805', '18', 'Kabupaten Rokan Hulu'),
('1901', '19', 'Kabupaten Siak'),
('1902', '19', 'Kabupaten Kuantan Singingi'),
('1903', '19', 'Kabupaten Kampar'),
('1904', '19', 'Kabupaten Rokan Hilir'),
('1905', '19', 'Kabupaten Kota Dumai'),
('2001', '20', 'Kabupaten Padang Pariaman'),
('2002', '20', 'Kabupaten Agam'),
('2003', '20', 'Kabupaten Lima Puluh Kota'),
('2004', '20', 'Kabupaten Tanah Datar'),
('2005', '20', 'Kabupaten Pasaman Barat'),
('2101', '21', 'Kabupaten Bengkulu Selatan'),
('2102', '21', 'Kabupaten Rejang Lebong'),
('2103', '21', 'Kabupaten Mukomuko'),
('2104', '21', 'Kabupaten Lebong'),
('2105', '21', 'Kabupaten Kaur'),
('2201', '22', 'Kabupaten Jambi'),
('2202', '22', 'Kabupaten Tanjung Jabung Barat'),
('2203', '22', 'Kabupaten Tanjung Jabung Timur'),
('2204', '22', 'Kabupaten Batang Hari'),
('2205', '22', 'Kabupaten Bungo'),
('2301', '23', 'Kabupaten Palembang'),
('2302', '23', 'Kabupaten Prabumulih'),
('2303', '23', 'Kabupaten Ogan Ilir'),
('2304', '23', 'Kabupaten Ogan Komering Ulu Selatan'),
('2305', '23', 'Kabupaten Ogan Komering Ulu Timur'),
('2401', '24', 'Kabupaten Bengkulu'),
('2402', '24', 'Kabupaten Rejang Lebong'),
('2403', '24', 'Kabupaten Mukomuko'),
('2404', '24', 'Kabupaten Lebong'),
('2405', '24', 'Kabupaten Kaur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provs`
--

CREATE TABLE `tb_provs` (
  `kode_prov` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_prov` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_provs`
--

INSERT INTO `tb_provs` (`kode_prov`, `nama_prov`) VALUES
('01', 'Aceh'),
('02', 'Sumatera Utara'),
('03', 'Sumatera Barat'),
('04', 'Riau'),
('05', 'Jambi'),
('06', 'Sumatera Selatan'),
('07', 'Bengkulu'),
('08', 'Lampung'),
('09', 'Kepulauan Bangka Belitung'),
('10', 'Kepulauan Riau'),
('11', 'DKI Jakarta'),
('12', 'Jawa Barat'),
('13', 'Jawa Tengah'),
('14', 'DI Yogyakarta'),
('15', 'Jawa Timur'),
('16', 'Banten'),
('17', 'Bali'),
('18', 'Nusa Tenggara Barat'),
('19', 'Nusa Tenggara Timur'),
('20', 'Kalimantan Barat'),
('21', 'Kalimantan Tengah'),
('22', 'Kalimantan Selatan'),
('23', 'Kalimantan Timur'),
('24', 'Kalimantan Utara'),
('25', 'Sulawesi Utara'),
('26', 'Gorontalo'),
('27', 'Sulawesi Tengah'),
('28', 'Sulawesi Selatan'),
('29', 'Sulawesi Tenggara'),
('30', 'Sulawesi Barat'),
('31', 'Maluku'),
('32', 'Maluku Utara'),
('33', 'Papua Barat'),
('34', 'Papua'),
('35', 'Kepulauan Seribu'),
('36', 'Gorontalo'),
('37', 'Sulawesi Barat'),
('38', 'Maluku Utara'),
('39', 'Papua Barat'),
('40', 'Papua'),
('41', 'Aceh Besar'),
('42', 'Aceh Tengah'),
('43', 'Aceh Timur'),
('44', 'Aceh Selatan'),
('45', 'Aceh Barat'),
('46', 'Aceh Singkil'),
('47', 'Aceh Jaya'),
('48', 'Bireuen'),
('49', 'Pidie'),
('50', 'Pidie Jaya'),
('51', 'Simeulue'),
('52', 'Aceh Utara'),
('53', 'Aceh Barat Daya'),
('54', 'Gayo Lues'),
('55', 'Aceh Tenggara'),
('56', 'Nagan Raya'),
('57', 'Aceh Tamiang'),
('58', 'Bener Meriah'),
('59', 'Pidie Jaya'),
('60', 'Sabang'),
('61', 'Langsa'),
('62', 'Lhokseumawe'),
('63', 'Subulussalam'),
('64', 'Simeulue'),
('65', 'Tapanuli Tengah'),
('66', 'Tapanuli Utara'),
('67', 'Tapanuli Selatan'),
('68', 'Nias'),
('69', 'Langkat'),
('70', 'Karo'),
('71', 'Serdang Bedagai'),
('72', 'Deli Serdang'),
('73', 'Simalungun'),
('74', 'Asahan'),
('75', 'Labuhan Batu'),
('76', 'Dairi'),
('77', 'Toba Samosir'),
('78', 'Tapanuli Tengah'),
('79', 'Tapanuli Utara'),
('80', 'Tapanuli Selatan'),
('81', 'Nias'),
('82', 'Langkat'),
('83', 'Karo'),
('84', 'Serdang Bedagai'),
('85', 'Deli Serdang'),
('86', 'Simalungun'),
('87', 'Asahan'),
('88', 'Labuhan Batu'),
('89', 'Dairi'),
('90', 'Toba Samosir'),
('91', 'Tapanuli Tengah'),
('92', 'Tapanuli Utara'),
('93', 'Tapanuli Selatan'),
('94', 'Nias'),
('95', 'Langkat'),
('96', 'Karo'),
('97', 'Serdang Bedagai'),
('98', 'Deli Serdang'),
('99', 'Simalungun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_prov` int(11) NOT NULL,
  `kode_kab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `jenis_kelamin`, `alamat`, `kode_prov`, `kode_kab`) VALUES
(1, 'Shawn Mendes', 'shawnmendes@gmail.com', 'Laki-laki', 'Jalan Tebet Barat V', 11, 101),
(2, 'Anne Shirley', 'anneshirley@gmail.com', 'Perempuan', 'Jalan green gables ', 60, 1702);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
