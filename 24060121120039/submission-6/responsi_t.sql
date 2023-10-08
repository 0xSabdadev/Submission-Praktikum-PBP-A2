-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 06:51 AM
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
-- Database: `responsi_t`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabs`
--

CREATE TABLE `tb_kabs` (
  `kode_kab` varchar(255) NOT NULL,
  `kode_prov` varchar(255) NOT NULL,
  `nama_kab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kabs`
--

INSERT INTO `tb_kabs` (`kode_kab`, `kode_prov`, `nama_kab`) VALUES
('1101', '11', 'Kabupaten Simeulue'),
('1102', '11', 'Kabupaten Aceh Singkil'),
('1103', '11', 'Kabupaten Aceh Selatan'),
('1104', '11', 'Kabupaten Aceh Tenggara'),
('1105', '11', 'Kabupaten Aceh Timur'),
('1106', '11', 'Kabupaten Aceh Tengah'),
('1107', '11', 'Kabupaten Aceh Barat'),
('1108', '11', 'Kabupaten Aceh Besar'),
('1109', '11', 'Kabupaten Pidie'),
('1110', '11', 'Kabupaten Bireuen'),
('1111', '11', 'Kabupaten Aceh Utara'),
('1112', '11', 'Kabupaten Aceh Barat Daya'),
('1113', '11', 'Kabupaten Gayo Lues'),
('1114', '11', 'Kabupaten Aceh Tamiang'),
('1115', '11', 'Kabupaten Nagan Raya'),
('1116', '11', 'Kabupaten Aceh Jaya'),
('1117', '11', 'Kabupaten Bener Meriah'),
('1118', '11', 'Kabupaten Pidie Jaya'),
('1171', '11', 'Kota Banda Aceh'),
('1172', '11', 'Kota Sabang'),
('1173', '11', 'Kota Langsa'),
('1174', '11', 'Kota Lhokseumawe'),
('1175', '11', 'Kota Subulussalam'),
('1201', '12', 'Kabupaten Nias'),
('1202', '12', 'Kabupaten Mandailing Natal'),
('1203', '12', 'Kabupaten Tapanuli Selatan'),
('1204', '12', 'Kabupaten Tapanuli Tengah'),
('1205', '12', 'Kabupaten Tapanuli Utara'),
('1206', '12', 'Kabupaten Toba Samosir'),
('1207', '12', 'Kabupaten Labuhan Batu'),
('1208', '12', 'Kabupaten Asahan'),
('1209', '12', 'Kabupaten Simalungun'),
('1210', '12', 'Kabupaten Dairi'),
('1211', '12', 'Kabupaten Karo'),
('1212', '12', 'Kabupaten Deli Serdang'),
('1213', '12', 'Kabupaten Langkat'),
('1214', '12', 'Kabupaten Nias Selatan'),
('1215', '12', 'Kabupaten Humbang Hasundutan'),
('1216', '12', 'Kabupaten Pakpak Bharat'),
('1217', '12', 'Kabupaten Samosir'),
('1218', '12', 'Kabupaten Serdang Bedagai'),
('1219', '12', 'Kabupaten Batu Bara'),
('1220', '12', 'Kabupaten Padang Lawas Utara'),
('1221', '12', 'Kabupaten Padang Lawas'),
('1222', '12', 'Kabupaten Labuhan Batu Selatan'),
('1223', '12', 'Kabupaten Labuhan Batu Utara'),
('1224', '12', 'Kabupaten Nias Utara'),
('1225', '12', 'Kabupaten Nias Barat'),
('1271', '12', 'Kota Sibolga'),
('1272', '12', 'Kota Tanjung Balai'),
('1273', '12', 'Kota Pematang Siantar'),
('1274', '12', 'Kota Tebing Tinggi'),
('1275', '12', 'Kota Medan'),
('1276', '12', 'Kota Binjai'),
('1277', '12', 'Kota Padangsidimpuan'),
('1278', '12', 'Kota Gunungsitoli'),
('1301', '13', 'Kabupaten Kepulauan Mentawai'),
('1302', '13', 'Kabupaten Pesisir Selatan'),
('1303', '13', 'Kabupaten Solok'),
('1304', '13', 'Kabupaten Sijunjung'),
('1305', '13', 'Kabupaten Tanah Datar'),
('1306', '13', 'Kabupaten Padang Pariaman'),
('1307', '13', 'Kabupaten Agam'),
('1308', '13', 'Kabupaten Lima Puluh Kota'),
('1309', '13', 'Kabupaten Pasaman'),
('1310', '13', 'Kabupaten Solok Selatan'),
('1311', '13', 'Kabupaten Dharmasraya'),
('1312', '13', 'Kabupaten Pasaman Barat'),
('1371', '13', 'Kota Padang'),
('1372', '13', 'Kota Solok'),
('1373', '13', 'Kota Sawah Lunto'),
('1374', '13', 'Kota Padang Panjang'),
('1375', '13', 'Kota Bukittinggi'),
('1376', '13', 'Kota Payakumbuh'),
('1377', '13', 'Kota Pariaman'),
('1401', '14', 'Kabupaten Kuantan Singingi'),
('1402', '14', 'Kabupaten Indragiri Hulu'),
('1403', '14', 'Kabupaten Indragiri Hilir'),
('1404', '14', 'Kabupaten Pelalawan'),
('1405', '14', 'Kabupaten S I A K'),
('1406', '14', 'Kabupaten Kampar'),
('1407', '14', 'Kabupaten Rokan Hulu'),
('1408', '14', 'Kabupaten Bengkalis'),
('1409', '14', 'Kabupaten Rokan Hilir'),
('1410', '14', 'Kabupaten Kepulauan Meranti'),
('1471', '14', 'Kota Pekanbaru'),
('1473', '14', 'Kota D U M A I'),
('1501', '15', 'Kabupaten Kerinci'),
('1502', '15', 'Kabupaten Merangin'),
('1503', '15', 'Kabupaten Sarolangun'),
('1504', '15', 'Kabupaten Batang Hari'),
('1505', '15', 'Kabupaten Muaro Jambi'),
('1506', '15', 'Kabupaten Tanjung Jabung Timur'),
('1507', '15', 'Kabupaten Tanjung Jabung Barat'),
('1508', '15', 'Kabupaten Tebo'),
('1509', '15', 'Kabupaten Bungo'),
('1571', '15', 'Kota Jambi'),
('1572', '15', 'Kota Sungai Penuh'),
('1601', '16', 'Kabupaten Ogan Komering Ulu'),
('1602', '16', 'Kabupaten Ogan Komering Ilir'),
('1603', '16', 'Kabupaten Muara Enim'),
('1604', '16', 'Kabupaten Lahat'),
('1605', '16', 'Kabupaten Musi Rawas'),
('1606', '16', 'Kabupaten Musi Banyuasin'),
('1607', '16', 'Kabupaten Banyu Asin'),
('1608', '16', 'Kabupaten Ogan Komering Ulu Selatan'),
('1609', '16', 'Kabupaten Ogan Komering Ulu Timur'),
('1610', '16', 'Kabupaten Ogan Ilir'),
('1611', '16', 'Kabupaten Empat Lawang'),
('1612', '16', 'Kabupaten Penukal Abab Lematang Ilir'),
('1613', '16', 'Kabupaten Musi Rawas Utara'),
('1671', '16', 'Kota Palembang'),
('1672', '16', 'Kota Prabumulih'),
('1673', '16', 'Kota Pagar Alam'),
('1674', '16', 'Kota Lubuklinggau'),
('1701', '17', 'Kabupaten Bengkulu Selatan'),
('1702', '17', 'Kabupaten Rejang Lebong'),
('1703', '17', 'Kabupaten Bengkulu Utara'),
('1704', '17', 'Kabupaten Kaur'),
('1705', '17', 'Kabupaten Seluma'),
('1706', '17', 'Kabupaten Mukomuko'),
('1707', '17', 'Kabupaten Lebong'),
('1708', '17', 'Kabupaten Kepahiang'),
('1709', '17', 'Kabupaten Bengkulu Tengah'),
('1771', '17', 'Kota Bengkulu'),
('1801', '18', 'Kabupaten Lampung Barat'),
('1802', '18', 'Kabupaten Tanggamus'),
('1803', '18', 'Kabupaten Lampung Selatan'),
('1804', '18', 'Kabupaten Lampung Timur'),
('1805', '18', 'Kabupaten Lampung Tengah'),
('1806', '18', 'Kabupaten Lampung Utara'),
('1807', '18', 'Kabupaten Way Kanan'),
('1808', '18', 'Kabupaten Tulangbawang'),
('1809', '18', 'Kabupaten Pesawaran'),
('1810', '18', 'Kabupaten Pringsewu'),
('1811', '18', 'Kabupaten Mesuji'),
('1812', '18', 'Kabupaten Tulang Bawang Barat'),
('1813', '18', 'Kabupaten Pesisir Barat'),
('1871', '18', 'Kota Bandar Lampung'),
('1872', '18', 'Kota Metro'),
('1901', '19', 'Kabupaten Bangka'),
('1902', '19', 'Kabupaten Belitung'),
('1903', '19', 'Kabupaten Bangka Barat'),
('1904', '19', 'Kabupaten Bangka Tengah'),
('1905', '19', 'Kabupaten Bangka Selatan'),
('1906', '19', 'Kabupaten Belitung Timur'),
('1971', '19', 'Kota Pangkal Pinang'),
('2101', '21', 'Kabupaten Karimun'),
('2102', '21', 'Kabupaten Bintan'),
('2103', '21', 'Kabupaten Natuna'),
('2104', '21', 'Kabupaten Lingga'),
('2105', '21', 'Kabupaten Kepulauan Anambas'),
('2171', '21', 'Kota B A T A M'),
('2172', '21', 'Kota Tanjung Pinang'),
('3101', '31', 'Kabupaten Kepulauan Seribu'),
('3171', '31', 'Kota Jakarta Selatan'),
('3172', '31', 'Kota Jakarta Timur'),
('3173', '31', 'Kota Jakarta Pusat'),
('3174', '31', 'Kota Jakarta Barat'),
('3175', '31', 'Kota Jakarta Utara'),
('3201', '32', 'Kabupaten Bogor'),
('3202', '32', 'Kabupaten Sukabumi'),
('3203', '32', 'Kabupaten Cianjur'),
('3204', '32', 'Kabupaten Bandung'),
('3205', '32', 'Kabupaten Garut'),
('3206', '32', 'Kabupaten Tasikmalaya'),
('3207', '32', 'Kabupaten Ciamis'),
('3208', '32', 'Kabupaten Kuningan'),
('3209', '32', 'Kabupaten Cirebon'),
('3210', '32', 'Kabupaten Majalengka'),
('3211', '32', 'Kabupaten Sumedang'),
('3212', '32', 'Kabupaten Indramayu'),
('3213', '32', 'Kabupaten Subang'),
('3214', '32', 'Kabupaten Purwakarta'),
('3215', '32', 'Kabupaten Karawang'),
('3216', '32', 'Kabupaten Bekasi'),
('3217', '32', 'Kabupaten Bandung Barat'),
('3218', '32', 'Kabupaten Pangandaran'),
('3271', '32', 'Kota Bogor'),
('3272', '32', 'Kota Sukabumi'),
('3273', '32', 'Kota Bandung'),
('3274', '32', 'Kota Cirebon'),
('3275', '32', 'Kota Bekasi'),
('3276', '32', 'Kota Depok'),
('3277', '32', 'Kota Cimahi'),
('3278', '32', 'Kota Tasikmalaya'),
('3279', '32', 'Kota Banjar'),
('3301', '33', 'Kabupaten Cilacap'),
('3302', '33', 'Kabupaten Banyumas'),
('3303', '33', 'Kabupaten Purbalingga'),
('3304', '33', 'Kabupaten Banjarnegara'),
('3305', '33', 'Kabupaten Kebumen'),
('3306', '33', 'Kabupaten Purworejo'),
('3307', '33', 'Kabupaten Wonosobo'),
('3308', '33', 'Kabupaten Magelang'),
('3309', '33', 'Kabupaten Boyolali'),
('3310', '33', 'Kabupaten Klaten'),
('3311', '33', 'Kabupaten Sukoharjo'),
('3312', '33', 'Kabupaten Wonogiri'),
('3313', '33', 'Kabupaten Karanganyar'),
('3314', '33', 'Kabupaten Sragen'),
('3315', '33', 'Kabupaten Grobogan'),
('3316', '33', 'Kabupaten Blora'),
('3317', '33', 'Kabupaten Rembang'),
('3318', '33', 'Kabupaten Pati'),
('3319', '33', 'Kabupaten Kudus'),
('3320', '33', 'Kabupaten Jepara'),
('3321', '33', 'Kabupaten Demak'),
('3322', '33', 'Kabupaten Semarang'),
('3323', '33', 'Kabupaten Temanggung'),
('3324', '33', 'Kabupaten Kendal'),
('3325', '33', 'Kabupaten Batang'),
('3326', '33', 'Kabupaten Pekalongan'),
('3327', '33', 'Kabupaten Pemalang'),
('3328', '33', 'Kabupaten Tegal'),
('3329', '33', 'Kabupaten Brebes'),
('3371', '33', 'Kota Magelang'),
('3372', '33', 'Kota Surakarta'),
('3373', '33', 'Kota Salatiga'),
('3374', '33', 'Kota Semarang'),
('3375', '33', 'Kota Pekalongan'),
('3376', '33', 'Kota Tegal'),
('3401', '34', 'Kabupaten Kulon Progo'),
('3402', '34', 'Kabupaten Bantul'),
('3403', '34', 'Kabupaten Gunung Kidul'),
('3404', '34', 'Kabupaten Sleman'),
('3471', '34', 'Kota Yogyakarta'),
('3501', '35', 'Kabupaten Pacitan'),
('3502', '35', 'Kabupaten Ponorogo'),
('3503', '35', 'Kabupaten Trenggalek'),
('3504', '35', 'Kabupaten Tulungagung'),
('3505', '35', 'Kabupaten Blitar'),
('3506', '35', 'Kabupaten Kediri'),
('3507', '35', 'Kabupaten Malang'),
('3508', '35', 'Kabupaten Lumajang'),
('3509', '35', 'Kabupaten Jember'),
('3510', '35', 'Kabupaten Banyuwangi'),
('3511', '35', 'Kabupaten Bondowoso'),
('3512', '35', 'Kabupaten Situbondo'),
('3513', '35', 'Kabupaten Probolinggo'),
('3514', '35', 'Kabupaten Pasuruan'),
('3515', '35', 'Kabupaten Sidoarjo'),
('3516', '35', 'Kabupaten Mojokerto'),
('3517', '35', 'Kabupaten Jombang'),
('3518', '35', 'Kabupaten Nganjuk'),
('3519', '35', 'Kabupaten Madiun'),
('3520', '35', 'Kabupaten Magetan'),
('3521', '35', 'Kabupaten Ngawi'),
('3522', '35', 'Kabupaten Bojonegoro'),
('3523', '35', 'Kabupaten Tuban'),
('3524', '35', 'Kabupaten Lamongan'),
('3525', '35', 'Kabupaten Gresik'),
('3526', '35', 'Kabupaten Bangkalan'),
('3527', '35', 'Kabupaten Sampang'),
('3528', '35', 'Kabupaten Pamekasan'),
('3529', '35', 'Kabupaten Sumenep'),
('3571', '35', 'Kota Kediri'),
('3572', '35', 'Kota Blitar'),
('3573', '35', 'Kota Malang'),
('3574', '35', 'Kota Probolinggo'),
('3575', '35', 'Kota Pasuruan'),
('3576', '35', 'Kota Mojokerto'),
('3577', '35', 'Kota Madiun'),
('3578', '35', 'Kota Surabaya'),
('3579', '35', 'Kota Batu'),
('3601', '36', 'Kabupaten Pandeglang'),
('3602', '36', 'Kabupaten Lebak'),
('3603', '36', 'Kabupaten Tangerang'),
('3604', '36', 'Kabupaten Serang'),
('3671', '36', 'Kota Tangerang'),
('3672', '36', 'Kota Cilegon'),
('3673', '36', 'Kota Serang'),
('3674', '36', 'Kota Tangerang Selatan'),
('5101', '51', 'Kabupaten Jembrana'),
('5102', '51', 'Kabupaten Tabanan'),
('5103', '51', 'Kabupaten Badung'),
('5104', '51', 'Kabupaten Gianyar'),
('5105', '51', 'Kabupaten Klungkung'),
('5106', '51', 'Kabupaten Bangli'),
('5107', '51', 'Kabupaten Karang Asem'),
('5108', '51', 'Kabupaten Buleleng'),
('5171', '51', 'Kota Denpasar'),
('5201', '52', 'Kabupaten Lombok Barat'),
('5202', '52', 'Kabupaten Lombok Tengah'),
('5203', '52', 'Kabupaten Lombok Timur'),
('5204', '52', 'Kabupaten Sumbawa'),
('5205', '52', 'Kabupaten Dompu'),
('5206', '52', 'Kabupaten Bima'),
('5207', '52', 'Kabupaten Sumbawa Barat'),
('5208', '52', 'Kabupaten Lombok Utara'),
('5271', '52', 'Kota Mataram'),
('5272', '52', 'Kota Bima'),
('5301', '53', 'Kabupaten Sumba Barat'),
('5302', '53', 'Kabupaten Sumba Timur'),
('5303', '53', 'Kabupaten Kupang'),
('5304', '53', 'Kabupaten Timor Tengah Selatan'),
('5305', '53', 'Kabupaten Timor Tengah Utara'),
('5306', '53', 'Kabupaten Belu'),
('5307', '53', 'Kabupaten Alor'),
('5308', '53', 'Kabupaten Lembata'),
('5309', '53', 'Kabupaten Flores Timur'),
('5310', '53', 'Kabupaten Sikka'),
('5311', '53', 'Kabupaten Ende'),
('5312', '53', 'Kabupaten Ngada'),
('5313', '53', 'Kabupaten Manggarai'),
('5314', '53', 'Kabupaten Rote Ndao'),
('5315', '53', 'Kabupaten Manggarai Barat'),
('5316', '53', 'Kabupaten Sumba Tengah'),
('5317', '53', 'Kabupaten Sumba Barat Daya'),
('5318', '53', 'Kabupaten Nagekeo'),
('5319', '53', 'Kabupaten Manggarai Timur'),
('5320', '53', 'Kabupaten Sabu Raijua'),
('5321', '53', 'Kabupaten Malaka'),
('5371', '53', 'Kota Kupang'),
('6101', '61', 'Kabupaten Sambas'),
('6102', '61', 'Kabupaten Bengkayang'),
('6103', '61', 'Kabupaten Landak'),
('6104', '61', 'Kabupaten Mempawah'),
('6105', '61', 'Kabupaten Sanggau'),
('6106', '61', 'Kabupaten Ketapang'),
('6107', '61', 'Kabupaten Sintang'),
('6108', '61', 'Kabupaten Kapuas Hulu'),
('6109', '61', 'Kabupaten Sekadau'),
('6110', '61', 'Kabupaten Melawi'),
('6111', '61', 'Kabupaten Kayong Utara'),
('6112', '61', 'Kabupaten Kubu Raya'),
('6171', '61', 'Kota Pontianak'),
('6172', '61', 'Kota Singkawang'),
('6201', '62', 'Kabupaten Kotawaringin Barat'),
('6202', '62', 'Kabupaten Kotawaringin Timur'),
('6203', '62', 'Kabupaten Kapuas'),
('6204', '62', 'Kabupaten Barito Selatan'),
('6205', '62', 'Kabupaten Barito Utara'),
('6206', '62', 'Kabupaten Sukamara'),
('6207', '62', 'Kabupaten Lamandau'),
('6208', '62', 'Kabupaten Seruyan'),
('6209', '62', 'Kabupaten Katingan'),
('6210', '62', 'Kabupaten Pulang Pisau'),
('6211', '62', 'Kabupaten Gunung Mas'),
('6212', '62', 'Kabupaten Barito Timur'),
('6213', '62', 'Kabupaten Murung Raya'),
('6271', '62', 'Kota Palangka Raya'),
('6301', '63', 'Kabupaten Tanah Laut'),
('6302', '63', 'Kabupaten Kota Baru'),
('6303', '63', 'Kabupaten Banjar'),
('6304', '63', 'Kabupaten Barito Kuala'),
('6305', '63', 'Kabupaten Tapin'),
('6306', '63', 'Kabupaten Hulu Sungai Selatan'),
('6307', '63', 'Kabupaten Hulu Sungai Tengah'),
('6308', '63', 'Kabupaten Hulu Sungai Utara'),
('6309', '63', 'Kabupaten Tabalong'),
('6310', '63', 'Kabupaten Tanah Bumbu'),
('6311', '63', 'Kabupaten Balangan'),
('6371', '63', 'Kota Banjarmasin'),
('6372', '63', 'Kota Banjar Baru'),
('6401', '64', 'Kabupaten Paser'),
('6402', '64', 'Kabupaten Kutai Barat'),
('6403', '64', 'Kabupaten Kutai Kartanegara'),
('6404', '64', 'Kabupaten Kutai Timur'),
('6405', '64', 'Kabupaten Berau'),
('6409', '64', 'Kabupaten Penajam Paser Utara'),
('6411', '64', 'Kabupaten Mahakam Hulu'),
('6471', '64', 'Kota Balikpapan'),
('6472', '64', 'Kota Samarinda'),
('6474', '64', 'Kota Bontang'),
('6501', '65', 'Kabupaten Malinau'),
('6502', '65', 'Kabupaten Bulungan'),
('6503', '65', 'Kabupaten Tana Tidung'),
('6504', '65', 'Kabupaten Nunukan'),
('6571', '65', 'Kota Tarakan'),
('7101', '71', 'Kabupaten Bolaang Mongondow'),
('7102', '71', 'Kabupaten Minahasa'),
('7103', '71', 'Kabupaten Kepulauan Sangihe'),
('7104', '71', 'Kabupaten Kepulauan Talaud'),
('7105', '71', 'Kabupaten Minahasa Selatan'),
('7106', '71', 'Kabupaten Minahasa Utara'),
('7107', '71', 'Kabupaten Bolaang Mongondow Utara'),
('7108', '71', 'Kabupaten Siau Tagulandang Biaro'),
('7109', '71', 'Kabupaten Minahasa Tenggara'),
('7110', '71', 'Kabupaten Bolaang Mongondow Selatan'),
('7111', '71', 'Kabupaten Bolaang Mongondow Timur'),
('7171', '71', 'Kota Manado'),
('7172', '71', 'Kota Bitung'),
('7173', '71', 'Kota Tomohon'),
('7174', '71', 'Kota Kotamobagu'),
('7201', '72', 'Kabupaten Banggai Kepulauan'),
('7202', '72', 'Kabupaten Banggai'),
('7203', '72', 'Kabupaten Morowali'),
('7204', '72', 'Kabupaten Poso'),
('7205', '72', 'Kabupaten Donggala'),
('7206', '72', 'Kabupaten Toli-toli'),
('7207', '72', 'Kabupaten Buol'),
('7208', '72', 'Kabupaten Parigi Moutong'),
('7209', '72', 'Kabupaten Tojo Una-una'),
('7210', '72', 'Kabupaten Sigi'),
('7211', '72', 'Kabupaten Banggai Laut'),
('7212', '72', 'Kabupaten Morowali Utara'),
('7271', '72', 'Kota Palu'),
('7301', '73', 'Kabupaten Kepulauan Selayar'),
('7302', '73', 'Kabupaten Bulukumba'),
('7303', '73', 'Kabupaten Bantaeng'),
('7304', '73', 'Kabupaten Jeneponto'),
('7305', '73', 'Kabupaten Takalar'),
('7306', '73', 'Kabupaten Gowa'),
('7307', '73', 'Kabupaten Sinjai'),
('7308', '73', 'Kabupaten Maros'),
('7309', '73', 'Kabupaten Pangkajene Dan Kepulauan'),
('7310', '73', 'Kabupaten Barru'),
('7311', '73', 'Kabupaten Bone'),
('7312', '73', 'Kabupaten Soppeng'),
('7313', '73', 'Kabupaten Wajo'),
('7314', '73', 'Kabupaten Sidenreng Rappang'),
('7315', '73', 'Kabupaten Pinrang'),
('7316', '73', 'Kabupaten Enrekang'),
('7317', '73', 'Kabupaten Luwu'),
('7318', '73', 'Kabupaten Tana Toraja'),
('7322', '73', 'Kabupaten Luwu Utara'),
('7325', '73', 'Kabupaten Luwu Timur'),
('7326', '73', 'Kabupaten Toraja Utara'),
('7371', '73', 'Kota Makassar'),
('7372', '73', 'Kota Parepare'),
('7373', '73', 'Kota Palopo'),
('7401', '74', 'Kabupaten Buton'),
('7402', '74', 'Kabupaten Muna'),
('7403', '74', 'Kabupaten Konawe'),
('7404', '74', 'Kabupaten Kolaka'),
('7405', '74', 'Kabupaten Konawe Selatan'),
('7406', '74', 'Kabupaten Bombana'),
('7407', '74', 'Kabupaten Wakatobi'),
('7408', '74', 'Kabupaten Kolaka Utara'),
('7409', '74', 'Kabupaten Buton Utara'),
('7410', '74', 'Kabupaten Konawe Utara'),
('7411', '74', 'Kabupaten Kolaka Timur'),
('7412', '74', 'Kabupaten Konawe Kepulauan'),
('7413', '74', 'Kabupaten Muna Barat'),
('7414', '74', 'Kabupaten Buton Tengah'),
('7415', '74', 'Kabupaten Buton Selatan'),
('7471', '74', 'Kota Kendari'),
('7472', '74', 'Kota Baubau'),
('7501', '75', 'Kabupaten Boalemo'),
('7502', '75', 'Kabupaten Gorontalo'),
('7503', '75', 'Kabupaten Pohuwato'),
('7504', '75', 'Kabupaten Bone Bolango'),
('7505', '75', 'Kabupaten Gorontalo Utara'),
('7571', '75', 'Kota Gorontalo'),
('7601', '76', 'Kabupaten Majene'),
('7602', '76', 'Kabupaten Polewali Mandar'),
('7603', '76', 'Kabupaten Mamasa'),
('7604', '76', 'Kabupaten Mamuju'),
('7605', '76', 'Kabupaten Mamuju Utara'),
('7606', '76', 'Kabupaten Mamuju Tengah'),
('8101', '81', 'Kabupaten Maluku Tenggara Barat'),
('8102', '81', 'Kabupaten Maluku Tenggara'),
('8103', '81', 'Kabupaten Maluku Tengah'),
('8104', '81', 'Kabupaten Buru'),
('8105', '81', 'Kabupaten Kepulauan Aru'),
('8106', '81', 'Kabupaten Seram Bagian Barat'),
('8107', '81', 'Kabupaten Seram Bagian Timur'),
('8108', '81', 'Kabupaten Maluku Barat Daya'),
('8109', '81', 'Kabupaten Buru Selatan'),
('8171', '81', 'Kota Ambon'),
('8172', '81', 'Kota Tual'),
('8201', '82', 'Kabupaten Halmahera Barat'),
('8202', '82', 'Kabupaten Halmahera Tengah'),
('8203', '82', 'Kabupaten Kepulauan Sula'),
('8204', '82', 'Kabupaten Halmahera Selatan'),
('8205', '82', 'Kabupaten Halmahera Utara'),
('8206', '82', 'Kabupaten Halmahera Timur'),
('8207', '82', 'Kabupaten Pulau Morotai'),
('8208', '82', 'Kabupaten Pulau Taliabu'),
('8271', '82', 'Kota Ternate'),
('8272', '82', 'Kota Tidore Kepulauan'),
('9101', '91', 'Kabupaten Fakfak'),
('9102', '91', 'Kabupaten Kaimana'),
('9103', '91', 'Kabupaten Teluk Wondama'),
('9104', '91', 'Kabupaten Teluk Bintuni'),
('9105', '91', 'Kabupaten Manokwari'),
('9106', '91', 'Kabupaten Sorong Selatan'),
('9107', '91', 'Kabupaten Sorong'),
('9108', '91', 'Kabupaten Raja Ampat'),
('9109', '91', 'Kabupaten Tambrauw'),
('9110', '91', 'Kabupaten Maybrat'),
('9111', '91', 'Kabupaten Manokwari Selatan'),
('9112', '91', 'Kabupaten Pegunungan Arfak'),
('9171', '91', 'Kota Sorong'),
('9401', '94', 'Kabupaten Merauke'),
('9402', '94', 'Kabupaten Jayawijaya'),
('9403', '94', 'Kabupaten Jayapura'),
('9404', '94', 'Kabupaten Nabire'),
('9408', '94', 'Kabupaten Kepulauan Yapen'),
('9409', '94', 'Kabupaten Biak Numfor'),
('9410', '94', 'Kabupaten Paniai'),
('9411', '94', 'Kabupaten Puncak Jaya'),
('9412', '94', 'Kabupaten Mimika'),
('9413', '94', 'Kabupaten Boven Digoel'),
('9414', '94', 'Kabupaten Mappi'),
('9415', '94', 'Kabupaten Asmat'),
('9416', '94', 'Kabupaten Yahukimo'),
('9417', '94', 'Kabupaten Pegunungan Bintang'),
('9418', '94', 'Kabupaten Tolikara'),
('9419', '94', 'Kabupaten Sarmi'),
('9420', '94', 'Kabupaten Keerom'),
('9426', '94', 'Kabupaten Waropen'),
('9427', '94', 'Kabupaten Supiori'),
('9428', '94', 'Kabupaten Mamberamo Raya'),
('9429', '94', 'Kabupaten Nduga'),
('9430', '94', 'Kabupaten Lanny Jaya'),
('9431', '94', 'Kabupaten Mamberamo Tengah'),
('9432', '94', 'Kabupaten Yalimo'),
('9433', '94', 'Kabupaten Puncak'),
('9434', '94', 'Kabupaten Dogiyai'),
('9435', '94', 'Kabupaten Intan Jaya'),
('9436', '94', 'Kabupaten Deiyai'),
('9471', '94', 'Kota Jayapura');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provs`
--

CREATE TABLE `tb_provs` (
  `kode_prov` varchar(255) NOT NULL,
  `nama_prov` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_provs`
--

INSERT INTO `tb_provs` (`kode_prov`, `nama_prov`) VALUES
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('13', 'Sumatera Barat'),
('14', 'Riau'),
('15', 'Jambi'),
('16', 'Sumatera Selatan'),
('17', 'Bengkulu'),
('18', 'Lampung'),
('19', 'Kepulauan Bangka Belitung'),
('21', 'Kepulauan Riau'),
('31', 'DKI Jakarta'),
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'Daerah Istimewa Yogyakarta'),
('35', 'Jawa Timur'),
('36', 'Banten'),
('51', 'Bali'),
('52', 'Nusa Tenggara Barat'),
('53', 'Nusa Tenggara Timur'),
('61', 'Kalimantan Barat'),
('62', 'Kalimantan Tengah'),
('63', 'Kalimantan Selatan'),
('64', 'Kalimantan Timur'),
('65', 'Kalimantan Utara'),
('71', 'Sulawesi Utara'),
('72', 'Sulawesi Tengah'),
('73', 'Sulawesi Selatan'),
('74', 'Sulawesi Tenggara'),
('75', 'Gorontalo'),
('76', 'Sulawesi Barat'),
('81', 'Maluku'),
('82', 'Maluku Utara'),
('91', 'Papua Barat'),
('94', 'Papua');

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
  `kode_prov` int(11) NOT NULL,
  `kode_kab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD PRIMARY KEY (`kode_kab`),
  ADD KEY `tb_kabs_kode_prov_foreign` (`kode_prov`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kabs`
--
ALTER TABLE `tb_kabs`
  ADD CONSTRAINT `tb_kabs_kode_prov_foreign` FOREIGN KEY (`kode_prov`) REFERENCES `tb_provs` (`kode_prov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
