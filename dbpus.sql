-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 01:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(5, 'AkmalMaulana', 'jwd', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(5) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori`, `pengarang`, `penerbit`, `status`) VALUES
('BK001', 'How to build a car', 'Biography', 'Adrian Newey', 'Erlangga', 'Tiada'),
('BK002', 'Septian', 'Novel', 'Poppy Pertiwi', 'Coconuts Book', 'Tersedia'),
('BK003', 'Belajar PHP', 'Ilmu Komputer', 'Candra', 'Media Baca', 'Tersedia'),
('BK004', 'Belajar HTML', 'Ilmu Komputer', 'Rahmat Hakim', 'Media Baca', 'Tersedia'),
('BK005', 'Pintar CSS', 'Ilmu Komputer', 'Anton', 'Graha Buku', 'Tersedia'),
('BK006', 'Cerita Dogeng', 'Buku Cerita', 'Akmal Maulana', 'Erlangga', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `id_anggota` varchar(20) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `nomor_tlp` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`id_anggota`, `nama_anggota`, `jenis_kelamin`, `nomor_tlp`, `email`, `alamat`, `status`, `foto`) VALUES
('AG001', 'George Russell', 'Pria', 2147483647, 'georgerussel123@gmail.com', 'Bogor', '', 'AG001.jpg'),
('AG002', 'Lewis Hamilton', 'Pria', 8180606, 'lewisham@gmail.com', 'Bogor', 'Tidak Meminjam', 'AG002.png'),
('AG003', 'Vettel', 'Pria', 101213, 'sebvette1234l@gmail.com', 'Germany', 'Tidak Meminjam', 'AG003.jpg'),
('AG123', 'Vettel', 'Pria', 628180606, 'sebvettel@gmail.com', 'German', 'Tidak Meminjam', 'AG123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `id_transaksi` varchar(5) NOT NULL,
  `id_anggota` varchar(5) NOT NULL,
  `id_buku` varchar(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`id_transaksi`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
('TR001', 'AG001', 'BK006', '2022-09-22', '2022-09-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_id_anggota` (`id_anggota`),
  ADD KEY `fk_id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD CONSTRAINT `fk_id_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tbanggota` (`id_anggota`),
  ADD CONSTRAINT `fk_id_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
