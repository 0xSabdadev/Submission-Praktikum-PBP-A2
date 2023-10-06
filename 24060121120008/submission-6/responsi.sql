-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 03:25 PM
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
('10_sulbar_1', '10_sulbar', 'Kabupaten Majene'),
('10_sulbar_2', '10_sulbar', 'Kabupaten Mamasa'),
('10_sulbar_3', '10_sulbar', 'Kabupaten Mamuju'),
('10_sulbar_4', '10_sulbar', 'Kabupaten Mamuju Tengah'),
('10_sulbar_5', '10_sulbar', 'Kabupaten Pasangkayu'),
('10_sulbar_6', '10_sulbar', 'Kabupaten Polewali Mandar'),
('1_sumut_1', '1_sumut', 'Kabupaten Asahan'),
('1_sumut_10', '1_sumut', 'Kabupaten Langkat'),
('1_sumut_11', '1_sumut', 'Kabupaten Mandailing Natal'),
('1_sumut_12', '1_sumut', 'Kabupaten Nias'),
('1_sumut_13', '1_sumut', 'Kabupaten Nias Barat'),
('1_sumut_14', '1_sumut', 'Kabupaten Nias Selatan'),
('1_sumut_15', '1_sumut', 'Kabupaten Nias Utara'),
('1_sumut_16', '1_sumut', 'Kabupaten Padang Lawas'),
('1_sumut_17', '1_sumut', 'Kabupaten Padang Lawas Utara'),
('1_sumut_18', '1_sumut', 'Kabupaten Pakpak Bharat'),
('1_sumut_19', '1_sumut', 'Kabupaten Samosir'),
('1_sumut_2', '1_sumut', 'Kabupaten Batu Bara'),
('1_sumut_20', '1_sumut', 'Kabupaten Serdang Bedagai'),
('1_sumut_21', '1_sumut', 'Kabupaten Simalungun'),
('1_sumut_22', '1_sumut', 'Kota Binjai'),
('1_sumut_23', '1_sumut', 'Kabupaten Tapanuli Selatan'),
('1_sumut_24', '1_sumut', 'Kota Tebing Tinggi'),
('1_sumut_25', '1_sumut', 'Kabupaten Tapanuli Tengah'),
('1_sumut_26', '1_sumut', 'Kabupaten Tapanuli Utara'),
('1_sumut_27', '1_sumut', 'Kabupaten Toba'),
('1_sumut_28', '1_sumut', 'Kota Gunungsitoli'),
('1_sumut_29', '1_sumut', 'Kota Medan'),
('1_sumut_3', '1_sumut', 'Kabupaten Dairi'),
('1_sumut_30', '1_sumut', 'Kota Padangsidempuan'),
('1_sumut_31', '1_sumut', 'Kota Pematangsiantar'),
('1_sumut_32', '1_sumut', 'Kota Sibolga'),
('1_sumut_33', '1_sumut', 'Kota Tanjungbalai'),
('1_sumut_4', '1_sumut', 'Kabupaten Deli Serdang'),
('1_sumut_5', '1_sumut', 'Kabupaten Humbang Hasundutan'),
('1_sumut_6', '1_sumut', 'Kabupaten Karo'),
('1_sumut_7', '1_sumut', 'Kabupaten Labuhanbatu'),
('1_sumut_8', '1_sumut', 'Kabupaten Labuhanbatu Selatan'),
('1_sumut_9', '1_sumut', 'Kabupaten Labuhanbatu Utara'),
('2_dki_1', '2_dki', 'Kabupaten Administrasi Kepulauan Seribu'),
('2_dki_2', '2_dki', 'Kota Administrasi Jakarta Barat'),
('2_dki_3', '2_dki', 'Kota Administrasi Jakarta Pusat'),
('2_dki_4', '2_dki', 'Kota Administrasi Jakarta Selatan'),
('2_dki_5', '2_dki', 'Kota Administrasi Jakarta Timur'),
('2_dki_6', '2_dki', 'Kota Administrasi Jakarta Utara'),
('3_jabar_1', '3_jabar', 'Kabupaten Bandung'),
('3_jabar_10', '3_jabar', 'Kota Tasikmalaya'),
('3_jabar_2', '3_jabar', 'Kabupaten Bekasi'),
('3_jabar_3', '3_jabar', 'Kabupaten Bogor'),
('3_jabar_4', '3_jabar', 'Kabupaten Cirebon'),
('3_jabar_5', '3_jabar', 'Kabupaten Sumedang'),
('3_jabar_6', '3_jabar', 'Kota Bandung'),
('3_jabar_7', '3_jabar', 'Kota Bekasi'),
('3_jabar_8', '3_jabar', 'Kota Bogor'),
('3_jabar_9', '3_jabar', 'Kota Depok'),
('4_jateng_1', '4_jateng', 'Kabupaten Jepara'),
('4_jateng_2', '4_jateng', 'Kabupaten Kebumen'),
('4_jateng_3', '4_jateng', 'Kabupaten Pati'),
('4_jateng_4', '4_jateng', 'Kabupaten Semarang'),
('4_jateng_5', '4_jateng', 'Kota Semarang'),
('5_yogya_1', '5_yogya', 'Kabupaten Bantul'),
('5_yogya_2', '5_yogya', 'Kabupaten Gunungkidul'),
('5_yogya_3', '5_yogya', 'Kabupaten Kulon Progo'),
('5_yogya_4', '5_yogya', 'Kabupaten Sleman'),
('5_yogya_5', '5_yogya', 'Kota Yogyakarta'),
('6_banten_1', '6_banten', 'Kabupaten Lebak'),
('6_banten_2', '6_banten', 'Kabupaten Pandeglang'),
('6_banten_3', '6_banten', 'Kabupaten Serang'),
('6_banten_4', '6_banten', 'Kabupaten Tangerang'),
('6_banten_5', '6_banten', 'Kabupaten Cilegon'),
('6_banten_6', '6_banten', 'Kota Serang'),
('6_banten_7', '6_banten', 'Kota Tangerang'),
('6_banten_8', '6_banten', 'Kota Tangerang Selatan'),
('7_bali_1', '7_bali', 'Kabupaten Badung'),
('7_bali_2', '7_bali', 'Kabupaten Bangli'),
('7_bali_3', '7_bali', 'Kabupaten Buleleng'),
('7_bali_4', '7_bali', 'Kabupaten Gianyar'),
('7_bali_5', '7_bali', 'Kabupaten Jembrana'),
('7_bali_6', '7_bali', 'Kabupaten Karangasem'),
('7_bali_7', '7_bali', 'Kabupaten Klungkung'),
('7_bali_8', '7_bali', 'Kabupaten Tabanan'),
('7_bali_9', '7_bali', 'Kota Denpasar'),
('8_kalut_1', '8_kalut', 'Kabupaten Bulungan'),
('8_kalut_2', '8_kalut', 'Kabupaten Malinau'),
('8_kalut_3', '8_kalut', 'Kabupaten Nunukan'),
('8_kalut_4', '8_kalut', 'Kabupaten Tana Tidung'),
('8_kalut_5', '8_kalut', 'Kota Tarakan'),
('9_gorontalo_1', '9_gorontalo', 'Kabupaten Boalemo'),
('9_gorontalo_2', '9_gorontalo', 'Kabupaten Bone Bolango'),
('9_gorontalo_3', '9_gorontalo', 'Kabupaten Gorontalo'),
('9_gorontalo_4', '9_gorontalo', 'Kabupaten Gorontalo Utara'),
('9_gorontalo_5', '9_gorontalo', 'Kabupaten Pohuwato'),
('9_gorontalo_6', '9_gorontalo', 'Kota Gorontalo');

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
('10_sulbar', 'Sulawesi Barat'),
('1_sumut', 'Sumatera Utara'),
('2_dki', 'Daerah Khusus Ibukota Jakarta'),
('3_jabar', 'Jawa Barat'),
('4_jateng', 'Jawa Tengah'),
('5_yogya', 'Daerah Istimewa Yogyakarta'),
('6_banten', 'Banten'),
('7_bali', 'Bali'),
('8_kalut', 'Kalimantan Utara'),
('9_gorontalo', 'Gorontalo');

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
(1, 'Tiara Fitra Ramadhani Siregar', 'tfitra77.tf@gmail.com', 'perempuan', 'Jalan Teuku Umar Gang Martabe, Lingkungan II, Kelurahan Losung, Kecamatan Padangsidimpuan Selatan, Kota Padangsidimpuan, Sumatera Utara', '1_sumut', '1_sumut_30'),
(13, 'Duma Mora Arta Sitorus', 'qyucomel@gmail.com', 'perempuan', 'Rusun', '4_jateng', '4_jateng_5'),
(14, 'Thomas Alexander', 'ocom@user.com', 'perempuan', 'Jalan teuku umar, pimpuan', '1_sumut', '1_sumut_30'),
(15, 'Bob Ganteng', 'bobanteng@user.com', 'laki-laki', 'jalan teuku umar, rumah upun', '1_sumut', '1_sumut_30'),
(16, 'Martha', 'martha@user.com', 'perempuan', 'JL. Sudirman', '2_dki', '2_dki_4');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
