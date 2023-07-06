-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 02:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_sektoral`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `kode_urusan` varchar(3) NOT NULL,
  `kode_bidang` varchar(3) NOT NULL,
  `bidang` text NOT NULL,
  `id_unit_organisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `kode_urusan` varchar(3) NOT NULL,
  `kode_bidang` varchar(3) NOT NULL,
  `kode_program` varchar(3) NOT NULL,
  `kode_kegiatan` varchar(3) NOT NULL,
  `kegiatan` text NOT NULL,
  `id_unit_organisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `kode_lokasi` varchar(3) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `kode_lokasi`, `lokasi`) VALUES
(1, '001', 'Kab. Manokwari'),
(2, '002', 'Provinsi Papua Barat'),
(3, '003', 'Jakarta'),
(4, '004', 'Yogyakarta & Makassar'),
(5, '005', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id` int(11) NOT NULL,
  `unit_organisasi` varchar(255) NOT NULL,
  `nama_opd` text NOT NULL,
  `kepala_dinas` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id`, `unit_organisasi`, `nama_opd`, `kepala_dinas`, `nip`, `pangkat`) VALUES
(1, '2.09.0.1.00.11', 'Dinas Perumahan Umum dan Pemukiman Rakyat', '', '', ''),
(2, '2.09.0.1.00.12', 'Dinas Kominfo Persandian dan Statistik', 'FRANS P. ISTIA, S.Sos, MM', '19690310 199103 1 017', 'Pembina Utama Muda'),
(3, '2.09.0.1.00.13', 'Dinas Kesehatan', 'Nama Kepala Dinas', 'NIP Kepala Dinas', 'Pangkat Kepala Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `kode_urusan` varchar(3) NOT NULL,
  `kode_bidang` varchar(3) NOT NULL,
  `kode_program` varchar(3) NOT NULL,
  `program` text NOT NULL,
  `id_unit_organisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `renja`
--

CREATE TABLE `renja` (
  `id` int(11) NOT NULL,
  `kode_urusan` varchar(3) NOT NULL,
  `kode_bidang` varchar(3) NOT NULL,
  `kode_program` varchar(3) NOT NULL,
  `kode_kegiatan` varchar(3) NOT NULL,
  `kode_sub_kegiatan` varchar(3) NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_daerah` text DEFAULT NULL,
  `kode_lokasi` varchar(3) NOT NULL,
  `tolok_ukur_capaian` text NOT NULL,
  `target_capaian` varchar(255) NOT NULL,
  `tolok_ukur_sub_keg` text NOT NULL,
  `target_sub_keg` varchar(255) NOT NULL,
  `tolok_ukur_hasil_keg` text NOT NULL,
  `target_hasil_keg` varchar(255) NOT NULL,
  `pagu_indikatif` double NOT NULL,
  `prakiraan_maju` double NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_unit_organisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kegiatan`
--

CREATE TABLE `sub_kegiatan` (
  `id` int(11) NOT NULL,
  `kode_urusan` varchar(3) NOT NULL,
  `kode_bidang` varchar(3) NOT NULL,
  `kode_program` varchar(3) NOT NULL,
  `kode_kegiatan` varchar(3) NOT NULL,
  `kode_sub_kegiatan` varchar(3) NOT NULL,
  `sub_kegiatan` text NOT NULL,
  `id_unit_organisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `urusan`
--

CREATE TABLE `urusan` (
  `id` int(11) NOT NULL,
  `kode_urusan` varchar(3) NOT NULL,
  `urusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` int(15) DEFAULT NULL,
  `id_unit_organisasi` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `alamat`, `no_telp`, `id_unit_organisasi`, `username`, `password`, `status`) VALUES
(1, 'Admin Aplikasi', NULL, NULL, NULL, 0, 'admin.aplikasi', '123', 1),
(2, 'Admin Kominfo', '19690310 199103 1 017', '', 0, 2, 'admin.kominfo', '123', 1),
(3, 'Admin P.U', '', '', 9, 1, 'admin.pu', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_urusan` (`kode_urusan`),
  ADD KEY `kode_bidang` (`kode_bidang`),
  ADD KEY `kode_urusan_2` (`kode_urusan`,`kode_bidang`),
  ADD KEY `id_unit_organisasi` (`id_unit_organisasi`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_bidang` (`kode_bidang`),
  ADD KEY `kode_program` (`kode_program`),
  ADD KEY `kode_urusan` (`kode_urusan`),
  ADD KEY `kode_kegiatan` (`kode_kegiatan`),
  ADD KEY `kode_urusan_2` (`kode_urusan`,`kode_bidang`,`kode_program`,`kode_kegiatan`),
  ADD KEY `id_unit_organisasi` (`id_unit_organisasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_organisasi` (`unit_organisasi`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_bidang` (`kode_bidang`),
  ADD KEY `kode_urusan` (`kode_urusan`),
  ADD KEY `kode_program` (`kode_program`),
  ADD KEY `kode_urusan_2` (`kode_urusan`,`kode_bidang`,`kode_program`),
  ADD KEY `id_unit_organisasi` (`id_unit_organisasi`);

--
-- Indexes for table `renja`
--
ALTER TABLE `renja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_urusan` (`kode_urusan`),
  ADD KEY `kode_bidang` (`kode_bidang`),
  ADD KEY `kode_program` (`kode_program`),
  ADD KEY `kode_kegiatan` (`kode_kegiatan`),
  ADD KEY `kode_sub_kegiatan` (`kode_sub_kegiatan`),
  ADD KEY `kode_lokasi` (`kode_lokasi`) USING BTREE,
  ADD KEY `id_unit_organisasi` (`id_unit_organisasi`) USING BTREE,
  ADD KEY `kode_urusan_2` (`kode_urusan`,`kode_bidang`,`kode_program`,`kode_kegiatan`,`kode_sub_kegiatan`);

--
-- Indexes for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kegiatan` (`kode_kegiatan`),
  ADD KEY `kode_program` (`kode_program`),
  ADD KEY `kode_bidang` (`kode_bidang`),
  ADD KEY `kode_urusan` (`kode_urusan`),
  ADD KEY `kode_sub_kegiatan` (`kode_sub_kegiatan`),
  ADD KEY `kode_urusan_2` (`kode_urusan`,`kode_bidang`,`kode_program`,`kode_kegiatan`,`kode_sub_kegiatan`),
  ADD KEY `id_unit_organisasi` (`id_unit_organisasi`);

--
-- Indexes for table `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_unit_organisasi` (`id_unit_organisasi`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renja`
--
ALTER TABLE `renja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`kode_urusan`,`kode_bidang`,`kode_program`) REFERENCES `program` (`kode_urusan`, `kode_bidang`, `kode_program`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`kode_urusan`,`kode_bidang`) REFERENCES `bidang` (`kode_urusan`, `kode_bidang`);

--
-- Constraints for table `renja`
--
ALTER TABLE `renja`
  ADD CONSTRAINT `renja_ibfk_1` FOREIGN KEY (`kode_urusan`,`kode_bidang`,`kode_program`,`kode_kegiatan`,`kode_sub_kegiatan`) REFERENCES `sub_kegiatan` (`kode_urusan`, `kode_bidang`, `kode_program`, `kode_kegiatan`, `kode_sub_kegiatan`);

--
-- Constraints for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  ADD CONSTRAINT `sub_kegiatan_ibfk_1` FOREIGN KEY (`kode_urusan`,`kode_bidang`,`kode_program`,`kode_kegiatan`) REFERENCES `kegiatan` (`kode_urusan`, `kode_bidang`, `kode_program`, `kode_kegiatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
