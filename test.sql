-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Des 2022 pada 08.30
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` int(11) NOT NULL,
  `tgl_antri` date NOT NULL,
  `no_antri` varchar(3) NOT NULL,
  `no_plat` varchar(10) NOT NULL,
  `kode_supplier` int(25) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `daerah_asal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `tgl_antri`, `no_antri`, `no_plat`, `kode_supplier`, `supplier`, `daerah_asal`) VALUES
(1, '2022-11-26', '1CD', 'BH8304WU', 111940, 'CV. ADI PUTRA SEJAHTERA', 'Kabupaten Bungo'),
(2, '2022-12-15', '2CD', 'BH8156NJ', 150505, 'Djambi', 'Kabupaten Bungo'),
(3, '2022-12-18', '6CD', 'BH8304WA', 111940, 'Djambi', 'Cibinong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data2`
--

CREATE TABLE `tbl_data2` (
  `id` int(11) NOT NULL,
  `id_antri` int(11) NOT NULL,
  `jenis_bokar` varchar(50) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `partai` varchar(2) NOT NULL,
  `drc_history` decimal(5,2) NOT NULL,
  `drc_taksir` decimal(5,2) NOT NULL,
  `file` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data2`
--

INSERT INTO `tbl_data2` (`id`, `id_antri`, `jenis_bokar`, `kelas`, `partai`, `drc_history`, `drc_taksir`, `file`) VALUES
(1, 1, 'Sheet', 'v', '1V', '0.00', '62.61', 0x352e6a7067),
(2, 2, 'Slab Tipis', 'C', '1C', '0.00', '62.60', 0x382e6a7067),
(3, 3, 'Slab Lump', 'S', '3 ', '0.00', '50.00', 0x342e6a7067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nik` int(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pabrik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nik`, `password`, `nama`, `email`, `pabrik`) VALUES
(1, 886675, '', 'Udin', '', 'TSS'),
(5, 444567, '', 'Udin', '', 'Djambi Waras Jujuhan'),
(8, 56419689, '', 'Udin', '', 'TSS'),
(9, 123123, '', 'Jarwo', '', '1234123'),
(10, 123123, '', 'Jarwo', '', '314124123'),
(11, 1234567890, 'pohonapel', 'Yoel', 'yoeledwinn@gmail.com', 'embe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data2`
--
ALTER TABLE `tbl_data2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_antri` (`id_antri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data2`
--
ALTER TABLE `tbl_data2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_data2`
--
ALTER TABLE `tbl_data2`
  ADD CONSTRAINT `tbl_data2_ibfk_1` FOREIGN KEY (`id_antri`) REFERENCES `tbl_data` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
