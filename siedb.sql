-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Sep 2017 pada 03.41
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siedb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbcabang`
--

CREATE TABLE `tbcabang` (
  `id_cab` int(11) NOT NULL,
  `nama_cab` varchar(200) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_telp` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbcabang`
--

INSERT INTO `tbcabang` (`id_cab`, `nama_cab`, `alamat`, `no_telp`) VALUES
(1, 'Monarch Bali 1', 'jalan suka-suka', 123123123),
(2, 'Monarch Bali 2', 'asdajksdjaksjdk', 12314),
(3, 'Monarch Bali 4', 'jalan suka- suka', 361435867);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjenis`
--

CREATE TABLE `tbjenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbjenis`
--

INSERT INTO `tbjenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Pembelian'),
(2, 'Perawatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjurusan`
--

CREATE TABLE `tbjurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(200) NOT NULL,
  `biaya` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbjurusan`
--

INSERT INTO `tbjurusan` (`id_jurusan`, `nama_jurusan`, `biaya`) VALUES
(1, 'Tata Hidangan', 18000000),
(2, 'Bartender', 18000000),
(3, 'Tata Boga', 16000000),
(4, 'Tata Graha', 10000000),
(5, 'Divisi Makanan dan Minuman', 29000000),
(6, 'Divisi Akomodasi Kamar', 23000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengeluaran`
--

CREATE TABLE `tbpengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_cab` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `biaya` int(15) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpengeluaran`
--

INSERT INTO `tbpengeluaran` (`id_pengeluaran`, `id_jenis`, `id_cab`, `deskripsi`, `biaya`, `tahun`) VALUES
(1, 1, 1, 'Pembelian AC 2pc', 5000000, 2017),
(2, 1, 1, 'Pembelian Monitor 10 ', 50000000, 2017),
(3, 1, 1, 'Membeli 2 pc Komputer', 10000000, 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpeserta`
--

CREATE TABLE `tbpeserta` (
  `id_peserta` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_cab` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `email` varchar(200) NOT NULL,
  `thn_daftar` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpeserta`
--

INSERT INTO `tbpeserta` (`id_peserta`, `id_jurusan`, `id_cab`, `nama`, `alamat`, `no_hp`, `jenis_kelamin`, `email`, `thn_daftar`) VALUES
(1, 1, 1, 'waka', 'waka', 123123, 'L', 'waka@waka.waka', 2017),
(3, 2, 1, 'zzz', 'a', 1, 'L', 'a', 2001),
(4, 5, 1, 'b', 'bb', 2, 'P', 'b', 2017),
(7, 4, 1, 'sayaian', 'jalan jalan suka suka', 81231823, 'L', 'suka@suka.com', 2017),
(8, 1, 3, 'zzzzzzz', 'z', 1, 'P', 'z', 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(11) NOT NULL,
  `id_cab` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `id_cab`, `nama`, `alamat`, `no_hp`, `email`, `jenis_kelamin`, `username`, `password`, `level`) VALUES
(1, 0, 'putu', 'putu', 123123, 'putu@putu.com', 'L', 'putu', 'putu', 1),
(3, 2, 'usil', 'jalan jalan jalan aja', 2147483647, 'akjshdjahs@kajksdj.com', 'L', 'nyoman', 'nyoman', 2),
(4, 3, 'aa', 'aa', 1, 'ajsdjahsd', 'P', 'a', 'a', 2),
(5, 1, 'suka', 'jalan dalaung kuta utara', 2147483647, 'sukasuaka@gmail.com', 'P', 'suka', 'suka', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcabang`
--
ALTER TABLE `tbcabang`
  ADD PRIMARY KEY (`id_cab`);

--
-- Indexes for table `tbjenis`
--
ALTER TABLE `tbjenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbpengeluaran`
--
ALTER TABLE `tbpengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `tbpeserta`
--
ALTER TABLE `tbpeserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcabang`
--
ALTER TABLE `tbcabang`
  MODIFY `id_cab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbjenis`
--
ALTER TABLE `tbjenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbjurusan`
--
ALTER TABLE `tbjurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbpengeluaran`
--
ALTER TABLE `tbpengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbpeserta`
--
ALTER TABLE `tbpeserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
