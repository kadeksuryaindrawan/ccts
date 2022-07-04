-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 07:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_datadiri`
--

CREATE TABLE `tb_datadiri` (
  `id_datadiri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto_diri` varchar(100) NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `status_pekerjaan` enum('bekerja','tidak bekerja','menempuh pendidikan') NOT NULL,
  `status_user` enum('proses','sudah jawab','lulus','tidak lulus') NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `id_gelombang` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datadiri`
--

INSERT INTO `tb_datadiri` (`id_datadiri`, `id_user`, `id_kategori`, `no_ktp`, `nama_lengkap`, `alamat`, `foto_diri`, `foto_ktp`, `status_pekerjaan`, `status_user`, `deleted`, `id_gelombang`) VALUES
(6, 20, 1, '5171029482278242', 'Surya Kadek Ganteng', 'Denpasar', '1613f99fad906b.jpg', '2613f99fad9070.jpeg', 'tidak bekerja', 'lulus', 0, ''),
(7, 22, 7, '513423422112', 'I Kadek Surya Indrawan', 'Denpasar', '16145305988f1c.jpg', '26145305988f20.jpg', 'tidak bekerja', 'tidak lulus', 0, '6'),
(8, 23, 4, '234567890', 'wdwd', 'awdsfgjk', '1616bb9a167164.jpg', '2616bb9a16716a.jpeg', 'tidak bekerja', 'sudah jawab', 0, '6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gelombang`
--

CREATE TABLE `tb_gelombang` (
  `id_gelombang` int(11) NOT NULL,
  `nama_gelombang` varchar(50) NOT NULL,
  `status_gelombang` enum('aktif','tidak aktif') NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gelombang`
--

INSERT INTO `tb_gelombang` (`id_gelombang`, `nama_gelombang`, `status_gelombang`, `deleted`) VALUES
(1, '1', 'tidak aktif', 0),
(2, '2', 'tidak aktif', 0),
(3, '3', 'tidak aktif', 0),
(4, '4', 'tidak aktif', 0),
(5, '5', 'tidak aktif', 0),
(6, '6', 'aktif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `deskripsi`, `deleted`) VALUES
(1, 'teknologi informasi', 'Kategori ini membahas mengenai pekerjaan di bidang IT', 0),
(2, 'Ekonomi', 'Kategori ini membahas mengenai pekerjaan di bidang Ekonomi', 0),
(4, 'pariwisata', 'Kategori ini membahas mengenai pekerjaan di bidang Ekonomi', 0),
(7, 'Seni budaya', 'Kategori ini membahas mengenai seni budaya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_gelombang` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_user`, `id_kategori`, `id_gelombang`, `nilai`, `deleted`) VALUES
(15, 20, 1, 1, 60, 0),
(16, 20, 1, 5, 60, 0),
(17, 22, 7, 6, 20, 0),
(18, 23, 4, 6, 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_option`
--

CREATE TABLE `tb_option` (
  `id_option` int(11) NOT NULL,
  `abjad` varchar(2) NOT NULL,
  `text_abjad` varchar(150) NOT NULL,
  `status_option` int(1) DEFAULT NULL,
  `id_soal` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_option`
--

INSERT INTO `tb_option` (`id_option`, `abjad`, `text_abjad`, `status_option`, `id_soal`, `deleted`) VALUES
(1, 'A', 'Data', 0, 1, 0),
(2, 'B', 'Informasi', 1, 1, 0),
(3, 'C', 'Teknologi Informasi', 0, 1, 0),
(5, 'A', 'Akomodasi', 0, 2, 0),
(6, 'B', 'Restoran', 0, 2, 0),
(7, 'C', 'Transportasi', 1, 2, 0),
(15, 'A', 'Terbatas', 0, 7, 0),
(16, 'B', 'Tidak terbatas', 1, 7, 0),
(17, 'C', 'Stabil dan relative', 0, 7, 0),
(18, 'A', 'Relevan', 1, 8, 0),
(19, 'B', 'Lengkap', 0, 8, 0),
(20, 'C', 'Akurat', 0, 8, 0),
(21, 'A', 'Philosophic Information', 0, 9, 0),
(22, 'B', 'Substitutional Information', 0, 9, 0),
(23, 'C', 'Absolut Information', 1, 9, 0),
(24, 'A', 'adwdwadwa', 0, 10, 1),
(25, 'B', 'adwdwadwadw', 0, 10, 1),
(26, 'C', 'dwwda', 1, 10, 1),
(27, 'A', 'Restoran', 0, 11, 0),
(28, 'B', 'Hotel', 1, 11, 0),
(29, 'C', 'Cinderamata', 0, 11, 0),
(30, 'A', 'Teknologi Informasi', 0, 12, 0),
(31, 'B', 'Data', 0, 12, 0),
(32, 'C', 'Teknologi', 1, 12, 0),
(33, 'A', 'Bekerja dengan menggunakan tenaga listrik', 0, 13, 0),
(34, 'B', 'Bekerja dengan hanya bergantung pada manusia', 1, 13, 0),
(35, 'C', 'Bekerja dalam suatu sistem', 0, 13, 0),
(36, 'A', 'Akomodasi', 0, 14, 0),
(37, 'B', 'Aksesibilitas', 1, 14, 0),
(38, 'C', 'Atraksi', 0, 14, 0),
(39, 'A', 'Wisatawan mancanegara', 1, 15, 0),
(40, 'B', 'Wisatawan tourist', 0, 15, 0),
(41, 'C', 'Wisatawan domestik', 0, 15, 0),
(42, 'A', 'Visa', 0, 16, 0),
(43, 'B', 'Passport', 1, 16, 0),
(44, 'C', 'KTP', 0, 16, 0),
(45, 'A', 'meja dan kursi', 0, 17, 0),
(46, 'B', 'komputer dan printer', 0, 17, 0),
(47, 'C', 'roti dan nasi', 1, 17, 0),
(48, 'A', 'barang komplementer', 1, 18, 0),
(49, 'B', 'barang ekonomi', 0, 18, 0),
(50, 'C', 'barang konsumsi', 0, 18, 0),
(51, 'A', 'barang tersebut didapat tanpa pengorbanan', 1, 19, 0),
(52, 'B', 'sulit untuk mendapatkan barang tersebut', 0, 19, 0),
(53, 'C', 'barang tersebut mempunyai kegunaan', 0, 19, 0),
(54, 'A', 'tersier', 0, 20, 0),
(55, 'B', 'sekarang', 0, 20, 0),
(56, 'C', 'primer', 1, 20, 0),
(57, 'A', 'cangkir', 0, 21, 0),
(58, 'B', 'gentong', 0, 21, 0),
(59, 'C', 'meja ukir', 1, 21, 0),
(60, 'A', 'mempertahankan hidup', 1, 22, 0),
(61, 'B', 'berburu binatang hidup', 0, 22, 0),
(62, 'C', 'melanjutkan hidup', 0, 22, 0),
(63, 'A', 'keuletan tangan', 0, 23, 0),
(64, 'B', 'kekuatan', 1, 23, 0),
(65, 'C', 'ketelitian', 0, 23, 0),
(66, 'A', 'seni pakai', 0, 24, 0),
(67, 'B', 'seni murni', 0, 24, 0),
(68, 'C', 'seni kriya', 1, 24, 0),
(69, 'A', 'perajin', 0, 25, 0),
(70, 'B', 'pemahat', 1, 25, 0),
(71, 'C', 'seniman', 0, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_gelombang` int(11) NOT NULL,
  `status_user` enum('belum jawab','sedang proses','lulus','tidak lulus') NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_riwayat`, `id_user`, `id_gelombang`, `status_user`, `deleted`) VALUES
(19, 20, 1, 'tidak lulus', 0),
(20, 20, 5, 'lulus', 0),
(21, 22, 6, 'tidak lulus', 0),
(22, 23, 6, 'sedang proses', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `soal` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `soal`, `id_kategori`, `deleted`) VALUES
(1, 'Sekumpulan data atau fakta yang telah diproses dan dikelola sedemikian rupa sehingga menjadi sesuatu yang mudah dimengerti dan bermanfaat bagi penerimanya. Merupakan pengertian dari?', 1, 0),
(2, 'Bus, Mobil dan Kereta Api termasuk jenis komponen pariwisata dalam bidang....', 4, 0),
(7, 'Alat pemuas sangat terbatas, tetapi kebutuhan manusia bersifat …', 2, 0),
(8, 'Salah satu ciri-ciri informasi yang berkualitas adalah informasi yang diberikan harus sesuai dengan yang dibutuhkan. Merupakan pengertian dari ciri-ciri informasi...', 1, 0),
(9, 'Komponen-komponen informasi yang merupakan ’pohonnya’ informasi, yaitu jenis informasi yang disajikan dengan suatu jaminan dan tidak membutuhkan penjelasan lebih lanjut disebut komponen...', 1, 0),
(10, 'dwawddwadwa', 4, 1),
(11, 'Dibawah ini yang termasuk jenis akomodasi, adalah....', 4, 0),
(12, 'Suatu metode atau cara untuk mencapai tujuan praktis guna mempermudah pemenuhan kebutuhan manusia disebut...', 1, 0),
(13, 'Dibawah ini yang BUKAN merupakan sifat-sifat komputer adalah...', 1, 0),
(14, 'Jarak tempuh antara satu objek dan objek lainnya termasuk kedalam komponen pariwisata...', 4, 0),
(15, 'Orang asing yang melakukan perjalanan wisata yang datang ke suatu negara yang bukan merupakan negara tempat tinggalnya, disebut....', 4, 0),
(16, 'Surat ijin jika ingin keluar negeri adalah...', 4, 0),
(17, 'Yang termasuk contoh barang substitusi adalah....', 2, 0),
(18, 'Barang yang fungsinya saling melengkapi disebut..', 2, 0),
(19, 'Suatu barang disebut barang bebas apabila....', 2, 0),
(20, 'kebutuhan sandang, pangan dan papan, masuk pada kategori kebutuhan', 2, 0),
(21, 'Jenis-jenis benda pakai yang dibuat dengan menggunakan teknik butsir dan cetak, kecuali….', 7, 0),
(22, 'Alat-alat yang diciptakan oleh manusia di zaman prasejarah digunakan untuk….', 7, 0),
(23, 'Pembuatan karya seni rupa terapan menonjolkan beberapa hal di bawah ini, kecuali…', 7, 0),
(24, 'Benda-benda seni rupa terapan sering juga disebut dengan…', 7, 0),
(25, 'Orang yang membuat benda-benda kerajinan disebut', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` enum('admin','user') NOT NULL,
  `status_daftar` enum('belum','sudah','-') NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `email`, `password`, `level_user`, `status_daftar`, `deleted`) VALUES
(1, 'admin@gmail.com', '$2y$12$SCP3xOvujNj/BGhEyopmVeVSi4htYZ3gfgXdlj9oa3ODuR.YszPOe', 'admin', '-', 0),
(20, 'kadektempeh@gmail.com', '$2y$12$i2kplc11MY8DHv8hUA6rAeQ3Br5AgLMJe2a2bX6F3jq4vRa9sfXke', 'user', 'sudah', 0),
(21, 'surya@gmail.com', '$2y$12$Ah3Z1gtBdtAgSsxLNXgz6u5v/xEVgH/wSKpmYWs79rrkKOUH6.cvW', 'user', 'belum', 0),
(22, 'kadeksuryaindrawan@gmail.com', '$2y$12$nKr1y0Q/rgKOCMqaGBOxCeskGnluWrkeShrIsoRso/P4/3mox4lM6', 'user', 'sudah', 0),
(23, 'ade@gmail.com', '$2y$12$k42PvgA/qWujIbVZ1g/QCOTUJ0IFw50jhzJdgyYwOpSHWraETN5qi', 'user', 'sudah', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_datadiri`
--
ALTER TABLE `tb_datadiri`
  ADD PRIMARY KEY (`id_datadiri`);

--
-- Indexes for table `tb_gelombang`
--
ALTER TABLE `tb_gelombang`
  ADD PRIMARY KEY (`id_gelombang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_option`
--
ALTER TABLE `tb_option`
  ADD PRIMARY KEY (`id_option`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_datadiri`
--
ALTER TABLE `tb_datadiri`
  MODIFY `id_datadiri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_gelombang`
--
ALTER TABLE `tb_gelombang`
  MODIFY `id_gelombang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_option`
--
ALTER TABLE `tb_option`
  MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
