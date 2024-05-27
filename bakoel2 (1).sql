-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 04:24 AM
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
-- Database: `bakoel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'chesya', '123'),
(2, 'ayun', '123'),
(3, 'salwa', '123');

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `ID` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(20) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `waktu_beli` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`ID`, `id_user`, `id_produk`, `metode_pembayaran`, `jumlah_beli`, `total_harga`, `waktu_beli`, `status`, `catatan`) VALUES
(2, 9, 17, 'cash', 1, 10000, '2024-05-16 08:52:09', NULL, 'COD depan perpus'),
(3, 14, 25, 'Qris', 2, 44000, '2024-05-15 10:52:09', NULL, 'COD depan lab kimia'),
(4, 24, 6, 'cash', 1, 3000, '2024-05-06 10:57:18', NULL, 'COD rutor 17'),
(5, 9, 7, 'cash', 1, 5000, '2024-05-15 10:32:09', NULL, 'COD depan perpus'),
(6, 18, 12, 'cash', 2, 4000, '2024-05-15 08:55:48', NULL, 'COD depan masjid ya kak'),
(7, 15, 6, 'cash', 1, 3000, '2024-05-15 18:55:48', NULL, 'COD depan masjid'),
(8, 18, 32, 'cash', 2, 10000, '2024-05-01 18:55:48', NULL, 'COD depan lab SIJA'),
(9, 12, 7, 'cash', 2, 10000, '2024-05-06 12:57:18', NULL, 'cod dpn masjid'),
(10, 27, 22, 'cash', 2, 6000, '2024-05-08 10:02:53', NULL, 'cod rutor 12'),
(11, 16, 24, 'Qris', 1, 15000, '2024-05-09 19:02:53', NULL, 'cod dpn lab sija'),
(12, 16, 6, 'cash', 2, 6000, '2024-05-09 19:04:21', NULL, 'cod dpn lab sija'),
(13, 15, 33, 'cash', 2, 4000, '2024-05-10 19:04:21', NULL, 'cod rutor 6'),
(14, 21, 14, 'cash', 3, 6000, '2024-05-01 08:55:48', NULL, 'cod dpn lab toi'),
(15, 26, 13, 'cash', 2, 4000, '2024-05-06 09:47:18', NULL, 'cod bengkel selatan'),
(16, 26, 3, 'cash', 2, 6000, '2024-05-09 09:02:53', NULL, 'cod bengkel selatan'),
(17, 16, 7, 'cash', 2, 10000, '2024-05-14 09:07:38', NULL, 'cod dpn lab sija'),
(18, 22, 7, 'cash', 2, 10000, '2024-05-09 09:02:10', NULL, 'cod rutor 13'),
(29, 16, 17, 'Qris', 2, 20000, '2024-05-17 13:45:22', NULL, 'cod dpn lab sija'),
(30, 14, 33, 'Qris', 3, 6000, '2024-05-09 10:02:10', NULL, 'cod rutor 12'),
(31, 18, 25, 'Qris', 1, 22000, '2024-05-18 13:47:44', NULL, 'antar lab pemrograman'),
(32, 12, 13, 'cash', 5, 10000, '2024-05-18 10:47:44', NULL, 'COD depan masjid'),
(33, 27, 22, 'cash', 1, 3000, '2024-05-18 13:07:44', NULL, 'cod bengkel selatan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ID` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `nama_produk` varchar(30) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `waktu_posting` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ID`, `id_toko`, `nama_produk`, `harga_produk`, `stok`, `deskripsi`, `gambar`, `waktu_posting`) VALUES
(2, 5, 'kulit ayam crispy', 5000, 20, 'kulit ayam crispy yang digoreng renyah membuat kulit ayam semakin enak.', 'kulitayam.jpg', '2024-05-13 18:57:40'),
(3, 5, 'risol mayo', 3000, 30, 'risol dengan isi mayonaise, sosis, dan telur ', 'risolmayo.jpg', '2024-05-14 19:23:57'),
(4, 5, 'risol sayur', 2500, 30, 'risol dengan isi sayur wortel dan kentang yang sudah diolah', 'risolsayur.jpg', '2024-05-10 19:23:57'),
(5, 9, 'es cincau', 2500, 20, 'cincau hitam dengan kuah cappucino', 'cincau.jpg', '2024-05-13 19:26:27'),
(6, 9, 'air mineral', 3000, 50, 'air mineral botol 600ml', 'mineral.jpg', '2024-05-13 10:26:27'),
(7, 9, 'es teh jumbo', 5000, 25, 'es teh original dengan cup jumbo', 'esteh.jpg', '2024-05-13 19:48:36'),
(8, 9, 'jus jambu', 2500, 25, 'jus jambu yang dikemas dalam plastik dan diikat', 'jusjambu.jpg', '2024-05-12 10:26:27'),
(9, 9, 'jus mangga', 2500, 25, 'jus mangga yang dikemas dalam plastik dan diikat', 'jusmangga.jpg', '2024-05-12 08:10:27'),
(12, 8, 'keripik kaca', 2000, 40, 'dikemas dalam plastik dan beratnya 200 gram', 'kripca.jpg', '2024-05-13 09:31:05'),
(13, 8, 'basreng', 2000, 40, 'dikemas dalam plastik dan beratnya 200 gram', 'basreng.jpg', '2024-05-13 10:31:05'),
(14, 8, 'kerupuk setan', 2000, 40, 'dikemas dalam plastik dan beratnya 200 gram', 'setan.jpg', '2024-05-12 10:33:36'),
(15, 8, 'makaroni pedas', 3000, 40, 'dikemas dalam plastik dan beratnya 200 gram', 'makaroni.jpg', '2024-05-08 12:33:36'),
(16, 10, 'nasi ayam goreng', 15000, 20, 'nasi, lalapan, ayam goreng, dan sambal', 'nasiayam.jpg', '2024-05-13 10:49:15'),
(17, 10, 'nasi lele goreng', 10000, 20, 'nasi, lalapan, lele goreng, dan sambal', 'nasilele.jpg', '2024-05-14 10:49:15'),
(18, 10, 'nasi goreng', 14000, 20, 'nasi goreng dengan telur mata sapi', 'nasgor.jpg', '2024-05-08 08:51:03'),
(19, 11, 'sabun cuci tangan', 20000, 10, 'sabun cuci tangan dengan bahan alami. pembuatan schoolmade', 'sabun.jpg', '2024-05-13 18:51:03'),
(20, 11, 'minyak kayu putih', 25000, 15, 'minyak kayu putih homemade', 'kayuputih.jpg', '2024-05-12 19:51:03'),
(21, 16, 'roti selai coklat', 3000, 20, 'roti tawar dengan selai rasa cokelat', 'roticoklat.jpg', '2024-05-14 08:28:06'),
(22, 16, 'roti selai vanilla', 3000, 30, 'roti tawar dengan selai rasa vanilla', 'rotivanilla.jpg', '2024-05-14 09:28:06'),
(23, 16, 'roti selai blueberry', 3000, 30, 'roti tawar dengan selai rasa blueberry', 'rotibluber.jpg', '2024-05-14 18:29:51'),
(24, 7, 'nasi bebek hemat', 15000, 20, 'nasi putih, bebek paha bawah + ceker, lalapan sambal bawang putih, dan bumbu hitam ', 'bebekhemat.jpg', '2024-05-15 08:30:51'),
(25, 7, 'nasi bebek besar', 22000, 20, 'nasi putih, bebek paha atas atau dada, lalapan sambal bawang putih, dan bumbu hitam ', 'bebekbesar.jpg', '2024-05-14 18:30:51'),
(26, 19, 'sosis solo', 2500, 25, 'isi ayam', 'sosissolo.jpg', '2024-05-14 17:33:00'),
(27, 19, 'tahu huhah', 2000, 20, 'tahu susur isi sayur dan sambal ', 'tahuha.jpg', '2024-05-20 18:33:00'),
(28, 15, 'nabati keju 8g', 1000, 20, 'nabati rasa keju ukuran kecil 8 gram', 'nabkej8.jpg', '2024-05-05 18:35:02'),
(29, 15, 'pilus rumput laut', 500, 20, 'pilus bdengan varian rasa rumput laut', 'pilus.jpg', '2024-05-22 18:37:23'),
(30, 15, 'taro rumput laut', 2000, 20, 'taro dengan varian rasa rumput laut', 'tarorl.jpg', '2024-05-15 10:37:23'),
(31, 15, 'piattos sapi panggang', 2000, 20, 'piattos dengan varian rasa sapi panggang', 'piatosapi.jpg', '2024-05-07 18:37:23'),
(32, 12, 'pudot bubble gum', 5000, 25, 'puding sedot dengan varian rasa permen karet', 'pudingbg.jpg', '2024-05-15 18:45:08'),
(33, 12, 'tela tela', 2000, 25, 'ketela yang digoreng dan dimarinasi dengan bumbu balado', 'tela.jpg', '2024-05-08 18:45:08'),
(34, 20, 'soes fla', 1500, 30, 'soes isi fla ', 'soes.jpg', '2024-05-06 08:47:39'),
(35, 13, 'takoyaki', 3000, 20, 'dikemas dengan mika dan isi 3 takoyaki', 'tako.jpg', '2024-05-07 18:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `ID` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_toko` varchar(15) DEFAULT NULL,
  `nomor_telepon` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`ID`, `id_user`, `nama_toko`, `nomor_telepon`) VALUES
(5, 6, 'DT here', 2147483647),
(7, 8, 'special_bebek', 298393893),
(8, 25, 'cemilankriuk', 929288232),
(9, 19, 'drinks', 985782312),
(10, 13, 'cari nasi?', 895422678),
(11, 5, 'produk kimia', 872890765),
(12, 10, 'toko irene', 886723451),
(13, 22, 'danus kbpl', 98123678),
(14, 15, 'teh poci', 88238765),
(15, 28, 'snack', 858782923),
(16, 7, 'roti sari', 859823891),
(17, 20, 'danus YOC', 87899872),
(18, 12, 'danus remais', 823489820),
(19, 4, 'danus pramuka', 879824567),
(20, 17, 'danus SIJA', 88928391),
(21, 29, 'hani shop', 879023415);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`) VALUES
(4, 'rania', 'rania123', 'rania12@gmail.com'),
(5, 'haifaz', 'hihi', 'haifanur@gmai.com'),
(6, 'raniw', '234', 'maharani35@gmail.com'),
(7, 'bungatiara', 'tiaraz', 'bungtir@gmail.com'),
(8, 'aksara', 'aksa456', 'aksarabagas@gmail.com'),
(9, 'azizah', '123', 'azizahbila@gmail.com'),
(10, 'irene', 'bita67', 'tsabitairene@gmail.com'),
(11, 'vayoo', '12345', 'violetta@gmail.com'),
(12, 'syiff', '789', 'nafisahsyifa@gmail.com'),
(13, 'hasnadewi', 'hasna123', 'hasna123@gmail.com'),
(14, 'daffaarya', 'dafdaf', 'daffaaryaz@gmail.com'),
(15, 'ocell', 'wocelo', 'ocela45@gmail.com'),
(16, 'yumzna', 'nana', 'yumnana@gmail.com'),
(17, 'sean', 'sean123', 'seanaksa@gmail.com'),
(18, 'rherhe', '12345', 'nafisyarhea@gmail.com'),
(19, 'sabian', 'rakatokan', 'sabianraka@gmail.com'),
(20, 'rell', 'farel123', 'farel827@gmail.com'),
(21, 'satria', '0987', 'satriabgus@gmail.com'),
(22, 'ivans', '8888', 'ivangunawan@gmail.com'),
(23, 'kalea', '222', 'kalealea@gmail.com'),
(24, 'apinn', '123', 'afinfifin@gmail.com'),
(25, 'elll', '567', 'rafaelgemi@gmail.com'),
(26, 'kamariww', '788', 'kamarilucu@gmail.com'),
(27, 'ikyy', 'iki123', 'rizkyiky@gmail.com'),
(28, 'ulfaintan', 'intan123', 'ulfaintan@gmail.com'),
(29, 'haani', '12345', 'hanihani@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `status` (`status`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `waktu_posting` (`waktu_posting`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`ID`),
  ADD CONSTRAINT `beli_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`ID`);

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `toko_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
