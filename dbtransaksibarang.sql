-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 04:55 PM
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
-- Database: `dbtransaksibarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `IdBarang` int(11) NOT NULL,
  `NamaBarang` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL,
  `Satuan` int(11) DEFAULT NULL,
  `IdPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`IdBarang`, `NamaBarang`, `Keterangan`, `Satuan`, `IdPengguna`) VALUES
(1, 'Kerudung Paris ', 'Kerudung paris ukuran 100x100', 55000, 6),
(2, 'Kerudung Pashmina', 'Kerudung pashmina ukuran 140x60', 70000, 6),
(3, 'Paku Payung Jenis A', 'Paku payung kecil dengan batang polos isi 30pcs', 9500, 10),
(4, 'Lem kayu Merk C', 'Lem kayu PVAC 400ml', 10500, 10),
(5, 'Cat Tembok Type A', 'Cat Tembok alkyd sintetik 1kg', 56000, 10),
(6, 'Cat Tembok Type B', 'Cat Tembok wall sealer 1kg', 65000, 10),
(7, 'Buku Tulis Sinar Bulan', 'Buku tulis bergaris merk Sinar Bulan isi 5pcs', 24000, 8),
(8, 'Penggaris Merk Giant', 'Penggaris 30cm merk Giant', 3000, 8),
(9, 'Pulpen Merk Coco', 'Pulpen cair tinta hitam merk Coco', 2000, 8),
(10, 'Penghapus Merk F', 'Penghapus pensil merk F', 1600, 8),
(11, 'Pensil 2B', 'Pensil 2B 24pcs', 14000, 8),
(12, 'Pensil HB', 'Pensil HB 24pcs', 14000, 8),
(13, 'Cat Air Merk X', 'Cat Air Merk X', 23000, 8),
(14, 'Kaos kaki pendek Biru', 'Sepasang kaos kaki biru merk A', 12000, 6),
(15, 'Kaos kaki pendek Krem', 'Sepasang kaos kaki krem merk A', 12000, 6),
(16, 'Kaos kaki pendek Hitam', 'Sepasang kaos kaki hitam merk A', 12000, 6),
(17, 'Kaos kaki panjang Putih', 'Sepasang kaos kaki putih merk A', 16000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `IdAkses` int(11) NOT NULL,
  `NamaAkses` varchar(15) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES
(12, 'Admin', 'Administrator'),
(13, 'Guest', 'Pengunjung dengan minimal akses'),
(14, 'Developer', 'Developer'),
(15, 'Buyer', 'Pembeli'),
(16, 'Seller', 'Penjual'),
(17, 'Supplier', 'Pemasok Barang'),
(18, 'AdminCourier', 'Administrator dari pihak kurir pengiriman'),
(19, 'Courier', 'Staff kurir pengiriman'),
(20, 'Accounting', 'Staff akunting'),
(21, 'Auditor', 'Staff audit');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `namaPelanggan` varchar(50) DEFAULT NULL,
  `alamatPelanggan` varchar(100) DEFAULT NULL,
  `noHP` varchar(13) DEFAULT NULL,
  `jenisKelaminCode` varchar(1) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `namaPelanggan`, `alamatPelanggan`, `noHP`, `jenisKelaminCode`, `tanggalLahir`) VALUES
(1, 'Aulia A', 'Jl. KH Agus Salim 16', '081234567890', 'L', '1990-05-15'),
(2, 'Bagas B', 'Jl. Taman Margasatwa No. 12', '081234567891', 'P', '1995-03-20'),
(3, 'Cinta C', 'JL. Tebet Raya No. 84', '081234567892', 'L', '1988-12-10'),
(4, 'Dimas D', 'Jl. Metro Pondok Indah Kav. IV', '081234567893', 'P', '2000-08-05'),
(5, 'Erwin E', 'Jl. KH. Agus Salim No. 29A Jakarta Pusat', '081234567894', 'L', '1993-11-28'),
(6, 'Fikri F', 'Jl. Hos Cokroaminoto', '081234567895', 'P', '1997-02-18'),
(7, 'Gading G', 'Jl. Ahmad Dahlan', '081234567896', 'L', '1985-07-22'),
(8, 'Hilda H', 'Jl. Bacang I No.2 Jakarta Selatan', '081234567897', 'P', '1992-04-30'),
(9, 'Indra I', 'Jl. Benda No. 20D', '081234567898', 'L', '1996-09-03'),
(10, 'Kirana J', 'Jl. Alam Segar 3 No. 8', '081234567899', 'P', '1991-06-12'),
(11, 'Joko K', 'Jl. Kebon Jeruk Raya No. 44 (depan SMPN 75) Jakarta Barat', '081234567810', 'L', '1998-01-25'),
(12, 'Maya L', 'Jl. Raya Pasar Minggu Jakarta Selatan', '081234567811', 'P', '1989-10-08'),
(13, 'Lala M', 'Jl. KH Asahari', '081234567812', 'L', '1994-04-15'),
(14, 'Omar N', 'Jl. Arya Putra', '081234567813', 'P', '1999-07-02'),
(15, 'Nanda O', 'Jl. Buaran Raya Blok D', '081234567814', 'L', '1987-03-11'),
(16, 'Pinkan P', 'Jl. Tebet Barat 1 No. 24', '081234567815', 'P', '1990-12-05'),
(17, 'Ririn Q', 'Jl. Fajar Baru Utara No.16A', '081234567816', 'L', '1993-08-28'),
(18, 'Qamar R', 'Jalan Srengseng Raya No. 1', '081234567817', 'P', '2001-02-15'),
(19, 'Toni S', 'Jalan Taman Aries Blok C6/1', '081234567818', 'L', '1995-05-19'),
(20, 'Syifa T', 'Jl. Raya Kelapa Dua No.2', '081234567819', 'P', '1997-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `IdPembelian` int(11) NOT NULL,
  `JumlahPembelian` int(11) DEFAULT NULL,
  `HargaBeli` decimal(20,4) DEFAULT NULL,
  `IdPengguna` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL,
  `idSupplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`IdPembelian`, `JumlahPembelian`, `HargaBeli`, `IdPengguna`, `IdBarang`, `idSupplier`) VALUES
(1, 5, 10000.0000, 7, 9, 1),
(2, 4, 96000.0000, 7, 7, 1),
(3, 1, 3000.0000, 7, 8, 2),
(4, 2, 3200.0000, 9, 10, 2),
(5, 2, 21000.0000, 9, 4, 3),
(6, 3, 28500.0000, 9, 3, 3),
(7, 5, 120000.0000, 5, 7, 4),
(8, 10, 20000.0000, 5, 9, 4),
(9, 2, 140000.0000, 5, 2, 5),
(10, 4, 220000.0000, 7, 1, 5),
(11, 2, 112000.0000, 7, 5, 6),
(12, 2, 130000.0000, 7, 6, 6),
(13, 4, 42000.0000, 9, 4, 7),
(14, 10, 30000.0000, 9, 8, 7),
(15, 10, 20000.0000, 9, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IdPengguna` int(11) NOT NULL,
  `NamaPengguna` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `NamaDepan` varchar(30) DEFAULT NULL,
  `NamaBelakang` varchar(30) DEFAULT NULL,
  `NoHp` varchar(13) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `IdAkses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IdPengguna`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`, `IdAkses`) VALUES
(2, 'nitaameliawijaya', '@Dmin#123', 'Nita Amelia', 'Wijaya', '081234568888', 'Jakarta Barat, ID', 12),
(3, 'admin', '@Dmin#123', 'admin', 'admin', '081234567890', 'Jakarta Selatan, ID', 12),
(4, 'fullstack', '@Dmin#123', 'fullstack', 'fullstack', '081234567890', 'Jakarta Selatan, ID', 14),
(5, 'visitor', 'P@ssw0rd', 'visitor', 'visitor', '081333444222', 'Yogyakarta, ID', 13),
(6, 'annamarselia1', 'Anna123', 'Anna', 'Marselia', '081555666777', 'Bandung, ID', 16),
(7, 'natashadiva', 'ct123', 'Natasha', 'Diva', '082444777888', 'Surabaya, ID', 15),
(8, 'fatamorgana', 'Ftmg#123', 'Fatamorgana', 'CV', '083666777333', 'Sleman, ID', 16),
(9, 'ratnagalih', 'ratnag123', 'Ratna', 'Galih', '085222444666', 'Medan, ID', 15),
(10, 'sumbermakmur', 'SM123', 'Sumber Makmur', 'TB', '083888222111', 'Tangerang, ID', 16),
(11, 'anterinadmin', 'P@ssw0rd123', 'Admin Anterin', 'PT', '083666444555', 'Bekasi, ID', 18);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` int(11) NOT NULL,
  `JumlahPenjualan` int(11) DEFAULT NULL,
  `HargaJual` decimal(20,4) DEFAULT NULL,
  `IdPengguna` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL,
  `idPelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`IdPenjualan`, `JumlahPenjualan`, `HargaJual`, `IdPengguna`, `IdBarang`, `idPelanggan`) VALUES
(1, 10, 550000.0000, 6, 1, 1),
(2, 10, 700000.0000, 6, 2, 1),
(3, 25, 237500.0000, 10, 3, 2),
(4, 15, 157500.0000, 10, 4, 2),
(5, 5, 280000.0000, 10, 5, 3),
(6, 5, 325000.0000, 10, 6, 3),
(7, 20, 480000.0000, 8, 7, 4),
(8, 30, 90000.0000, 8, 8, 5),
(9, 50, 100000.0000, 8, 9, 5),
(10, 50, 80000.0000, 8, 10, 6),
(11, 50, 700000.0000, 8, 11, 6),
(12, 50, 700000.0000, 8, 12, 7),
(13, 25, 575000.0000, 6, 13, 8),
(14, 20, 240000.0000, 6, 14, 8),
(15, 20, 240000.0000, 6, 15, 9);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` int(11) NOT NULL,
  `namaSupplier` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `noHP` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `namaSupplier`, `alamat`, `noHP`) VALUES
(1, 'Supplier Abadi', 'Jl. Mawar 1', '089765462387'),
(2, 'Supplier Budi Utomo', 'Jl. Melati 2', '089925631425'),
(3, 'Supplier Cici Abadi', 'Jl. Anggrek 3', '082177161478'),
(4, 'Supplier Toko Abadi', 'Jl. Tulip 4', '085787654323'),
(5, 'Supplier Eko', 'Jl. Lavender 5', '081234567890'),
(6, 'Supplier Toko Lengkap', 'Jl. Akasia 6', '082256738765'),
(7, 'Supplier Acung', 'Jl. Mangga 7', '089976564432'),
(8, 'Supplier Hj Iman', 'Jl. Durian 8', '089765452387'),
(9, 'Supplier Iin', 'Jl. Apel 9', '089095462387'),
(10, 'Supplier Joko Makmur', 'Jl. Jeruk 10', '089745462387'),
(11, 'Supplier Ko Lingfu', 'Jl. Durian 11', '085787754323'),
(12, 'Supplier Lia Medan', 'Jl. Manggis 12', '085787633323'),
(13, 'Supplier Makmur Jaya', 'Jl. Sawo 13', '085781154323'),
(14, 'Supplier Sentosa', 'Jl. Belimbing 14', '085782254323'),
(15, 'Supplier Sinar Jaya', 'Jl. Alpukat 15', '085787654322'),
(16, 'Supplier Senang Hati', 'Jl. Salak 16', '085784454323'),
(17, 'Supplier Cahaya Abadi', 'Jl. Pepaya 17', '085787644323'),
(18, 'Supplier Rukito', 'Jl. Kopi 18', '085787774323'),
(19, 'Supplier Mandiri', 'Jl. Teh Hijau 19', '089986564432'),
(20, 'Supplier Sinar Bintang', 'Jl. Cokelat 20', '089972264432');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IdBarang`),
  ADD KEY `IdPengguna` (`IdPengguna`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`IdAkses`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IdPembelian`),
  ADD KEY `IdPengguna` (`IdPengguna`),
  ADD KEY `IdBarang` (`IdBarang`),
  ADD KEY `idSupplier` (`idSupplier`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IdPengguna`),
  ADD KEY `IdAkses` (`IdAkses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `IdPengguna` (`IdPengguna`),
  ADD KEY `IdBarang` (`IdBarang`),
  ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `IdBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `IdAkses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `IdPembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `IdPengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `IdPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`),
  ADD CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`idSupplier`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `hakakses` (`IdAkses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`),
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
