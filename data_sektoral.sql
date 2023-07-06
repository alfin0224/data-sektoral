-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2022 at 06:42 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `akar_masalah`
--

CREATE TABLE `akar_masalah` (
  `id_akar_masalah` int(11) NOT NULL,
  `akar_masalah` text NOT NULL,
  `id_masalah_pokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `kode_urusan`, `kode_bidang`, `bidang`, `id_unit_organisasi`) VALUES
(1, '2', '16', 'URUSAN PEMERINTAHAN BIDANG KOMUNIKASI DAN INFORMATIKA', 2),
(2, '2', '20', 'URUSAN PEMERINTAHAN BIDANG STATISTIK', 2),
(3, '2', '21', 'URUSAN PEMERINTAHAN BIDANG PERSANDIAN\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id_indikator` int(11) NOT NULL,
  `indikator` text NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `tahun_pertama` varchar(255) NOT NULL,
  `tahun_kedua` varchar(255) NOT NULL,
  `tahun_ketiga` varchar(255) NOT NULL,
  `tahun_keempat` varchar(255) NOT NULL,
  `tahun_kelima` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `indikator`, `id_bidang`, `id_satuan`, `tahun_pertama`, `tahun_kedua`, `tahun_ketiga`, `tahun_keempat`, `tahun_kelima`) VALUES
(2, 'Sampel Uraian Indikator', 1, 1, 'Sampel Tahun Pertama', 'Sampel Tahun Kedua', 'Sampel Tahun Ketiga', 'Sampel Tahun Keempat', 'Sampel Tahun Keenam');

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

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kode_urusan`, `kode_bidang`, `kode_program`, `kode_kegiatan`, `kegiatan`, `id_unit_organisasi`) VALUES
(1, '2', '16', '01', '01', 'Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', 2),
(2, '2', '16', '01', '02', 'Administrasi Keuangan Perangkat Daerah ', 2),
(3, '2', '16', '01', '03', 'Administrasi Barang Milik Daerah pada Perangkat Daerah', 2),
(4, '2', '16', '01', '05', 'Administrasi Kepegawaian Perangkat Daerah', 2),
(5, '2', '16', '01', '06', 'Administrasi Umum Perangkat Daerah', 2),
(6, '2', '16', '01', '07', 'Pengadaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah', 2),
(7, '2', '16', '01', '08', 'Penyediaan Jasa Penunjang Urusan Pemerintahan Daerah', 2),
(8, '2', '16', '01', '09', 'Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah', 2),
(9, '2', '16', '02', '01', 'Pengelolaan Informasi dan Komunikasi Publik Pemerintah Daerah Provinsi', 2),
(10, '2', '16', '03', '01', 'Pengelolaan e-government di Lingkup \nPemerintah Daerah Provinsi', 2),
(11, '2', '20', '02', '01', 'Penyelenggaraan Statistik Sektoral di Lingkup Daerah Provinsi', 2),
(12, '2', '21', '02', '01', 'Penyelenggaraan Persandian untuk Pengamanan Informasi Pemerintah Daerah Provinsi', 2),
(13, '2', '21', '02', '02', 'Penetapan Pola Hubungan Komunikasi Sandi \nAntar Perangkat Daerah Kabupaten/Kota', 2);

-- --------------------------------------------------------

--
-- Table structure for table `keterkaitan_misi`
--

CREATE TABLE `keterkaitan_misi` (
  `id_keterkaitan` int(11) NOT NULL,
  `id_misi` int(11) NOT NULL,
  `id_masalah_pokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `masalah_pokok`
--

CREATE TABLE `masalah_pokok` (
  `id_masalah` int(11) NOT NULL,
  `masalah_pokok` text NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masalah_pokok`
--

INSERT INTO `masalah_pokok` (`id_masalah`, `masalah_pokok`, `id_bidang`) VALUES
(1, 'Sampel Masalah Pokok', 1);

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id_misi` int(11) NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id_misi`, `misi`) VALUES
(1, 'Menciptakan tata kelola pemerintahan yang baik berbasis aparatur yang bersih dan berwibawa (good and clean governance) serta otonomi khusus yang efektif							sampel																																																																						');

-- --------------------------------------------------------

--
-- Table structure for table `misi_bidang`
--

CREATE TABLE `misi_bidang` (
  `id_misi_bidang` int(11) NOT NULL,
  `id_misi` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `misi_bidang`
--

INSERT INTO `misi_bidang` (`id_misi_bidang`, `id_misi`, `id_bidang`) VALUES
(11, 1, 1);

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

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `kode_urusan`, `kode_bidang`, `kode_program`, `program`, `id_unit_organisasi`) VALUES
(1, '2', '16', '01', 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH PROVINSI ', 2),
(2, '2', '16', '02', 'PROGRAM PENGELOLAAN INFORMASI DAN KOMUNIKASI PUBLIK', 2),
(3, '2', '16', '03', 'PROGRAM PENGELOLAAN APLIKASI INFORMATIKA', 2),
(4, '2', '20', '02', 'PROGRAM PENYELENGGARAAN STATISTIK SEKTORAL', 2),
(5, '2', '21', '02', 'PROGRAM PENYELENGGARAAN PERSANDIAN UNTUK PENGAMANAN INFORMASI', 2);

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

--
-- Dumping data for table `renja`
--

INSERT INTO `renja` (`id`, `kode_urusan`, `kode_bidang`, `kode_program`, `kode_kegiatan`, `kode_sub_kegiatan`, `prioritas_daerah`, `sasaran_daerah`, `kode_lokasi`, `tolok_ukur_capaian`, `target_capaian`, `tolok_ukur_sub_keg`, `target_sub_keg`, `tolok_ukur_hasil_keg`, `target_hasil_keg`, `pagu_indikatif`, `prakiraan_maju`, `keterangan`, `id_unit_organisasi`) VALUES
(1, '2', '16', '01', '01', '01', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kinerja\nPenyelenggaraan Urusan\nPemerintahan', '001', 'Terwujudnya Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', '100%', 'Tersusunnya dokumen rencana kerja OPD ', '12 BULAN', 'Persentase penyelesaian\ndokumen perencanaan,\nevaluasi, data pokok,\ndan pelaporan perangkat\ndaerah.', '100%', 250000000, 255000000, NULL, 2),
(2, '2', '16', '01', '01', '02', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kinerja\nPenyelenggaraan Urusan\nPemerintahan', '001', 'Terwujudnya Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', '100%', 'Tersusunnya Dokumen RKA - SKPD', '12 BULAN', 'Persentase penyelesaian\ndokumen perencanaan,\nevaluasi, data pokok,\ndan pelaporan perangkat\ndaerah.', '100%', 300000000, 306000000, NULL, 2),
(3, '2', '16', '01', '01', '06', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kinerja\nPenyelenggaraan Urusan\nPemerintahan', '002', 'Terwujudnya Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', '100%', 'Terususunnya Dokumen LKIP-SKPD', '1 Laporan', 'Persentase penyelesaian\ndokumen perencanaan,\nevaluasi, data pokok,\ndan pelaporan perangkat\ndaerah.', '100%', 100000000, 102000000, NULL, 2),
(4, '2', '16', '01', '01', '07', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kinerja\nPenyelenggaraan Urusan\nPemerintahan', '002', 'Terwujudnya Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', '100%', 'Tersusunnya Dokumen Perencanaan', '12 BULAN', 'Persentase penyelesaian\ndokumen perencanaan,\nevaluasi, data pokok,\ndan pelaporan perangkat\ndaerah.', '100%', 500000000, 510000000, NULL, 2),
(5, '2', '16', '01', '02', '01', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kualitas Sumber Daya Aparatur', '001', 'Meningkatnya Administrasi Keuangan Perangkat Daerah', '100%', 'Tersedianya Gaji dan Tunjangan ASN', '14 BULAN', 'Terselenggaranya Administrasi Keuangan Perangkat Daerah ', '100%', 9200000000, 9384000000, NULL, 2),
(6, '2', '16', '01', '02', '02', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kualitas Sumber Daya Aparatur', '001', 'Meningkatnya Administrasi Keuangan Perangkat Daerah', '100%', 'Tersedianya administrasi pelaksana tugas ASN', '12 BULAN', 'Terselenggaranya Administrasi Keuangan Perangkat Daerah ', '100%', 2000000000, 2040000000, NULL, 2),
(7, '2', '16', '01', '02', '05', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya pengelolaan keuangan\nyang baik', '001', 'Meningkatnya Administrasi Keuangan Perangkat Daerah', '100%', 'tersusunnya laporan keuangan akhir tahun SKPD', '3 BULAN', 'Terselenggaranya Administrasi Keuangan Perangkat Daerah ', '100%', 150000000, 153000000, NULL, 2),
(8, '2', '16', '01', '03', '02', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', NULL, '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', 'Tersedianya Jasa keamanan kantor (satpam)', '12 BULAN', 'Terselenggaranya Administrasi Barang Milik Daerah pada Perangkat Daerah', '100%', 100000000, 102000000, NULL, 2),
(9, '2', '16', '01', '05', '02', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kualitas Sumber Daya Aparatur', '001', 'Meningkatnya Disiplin Aparatur  ,Kapasitas Sumber Daya\nAparatur ', '100%', 'tersedianya pakaian Dinas beserta atribut kelengkapannya', '89 orang', 'Terlaksananya Administrasi Kepegawaian Perangkat Daerah', '100%', 500000000, 510000000, NULL, 2),
(10, '2', '16', '01', '05', '9', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kualitas Sumber Daya Aparatur', '003', 'Meningkatnya Disiplin Aparatur  ,Kapasitas Sumber Daya\nAparatur ', '100%', 'terlaksananya Pendidikan dan Pelatihan Pegawai Berdasarkan Tugas dan Fungsi  ( Pelatihan Kehumasan )', '1 Kegiatan', 'Terlaksananya Administrasi Kepegawaian Perangkat Daerah', '100%', 300000000, 306000000, NULL, 2),
(11, '2', '16', '01', '05', '10', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kualitas Sumber Daya Aparatur', '002', 'Meningkatnya Disiplin Aparatur  ,Kapasitas Sumber Daya\nAparatur ', '100%', 'terlaksananya sosialisasi UU Keterbukaan Informasi', '1 Kegiatan', 'Terlaksananya Administrasi Kepegawaian Perangkat Daerah', '100%', 250000000, 255000000, NULL, 2),
(12, '2', '16', '01', '05', '10', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kualitas Sumber Daya Aparatur', '001', 'Meningkatnya Disiplin Aparatur  ,Kapasitas Sumber Daya\nAparatur ', '100%', 'Peraturan Gubernur Papua Barat disesuaikan dengan Perpres SPBE Nasional', '1 Kegiatan', 'Terlaksananya Administrasi Kepegawaian Perangkat Daerah', '100%', 300000000, 306000000, NULL, 2),
(13, '2', '16', '01', '05', '11', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kualitas Sumber Daya Aparatur', '004', 'Meningkatnya Disiplin Aparatur  ,Kapasitas Sumber Daya\nAparatur ', '100%', 'Terlaksananya Bimtek Untuk Meningkatkan SDM Bidang TIK', '16 orang', 'Terlaksananya Administrasi Kepegawaian Perangkat Daerah', '100%', 200000000, 204000000, NULL, 2),
(14, '2', '16', '01', '05', '11', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya Kualitas Sumber Daya Aparatur', '002', 'Meningkatnya Disiplin Aparatur  ,Kapasitas Sumber Daya\nAparatur ', '100%', 'terlaksananya bimbingan teknis implementasi peraturan perundang-undangan', '12 BULAN', 'Terlaksananya Administrasi Kepegawaian Perangkat Daerah', '100%', 750000000, 765000000, NULL, 2),
(15, '2', '16', '01', '06', '04', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'Tersedianya alat Tulis Kantor', '12 BULAN', 'Terlaksananya Administrasi Umum Perangkat Daerah', '100%', 350000000, 357000000, NULL, 2),
(16, '2', '16', '01', '06', '05', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'Tersedianya Barang Cetakan dan Penggandaan', '12 BULAN', 'Terlaksananya Administrasi Umum Perangkat Daerah', '100%', 300000000, 306000000, NULL, 2),
(17, '2', '16', '01', '06', '06', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'Tersedianya Bahan Bacaan dan Peraturan Perundang- undangan', '12 BULAN', 'Terlaksananya Administrasi Umum Perangkat Daerah', '100%', 250000000, 255000000, NULL, 2),
(18, '2', '16', '01', '06', '08', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'Tersedianya Makan dan Minum Rapat', '12 BULAN', 'Terlaksananya Administrasi Umum Perangkat Daerah', '100%', 500000000, 510000000, NULL, 2),
(19, '2', '16', '01', '06', '09', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'terselenggaraan rapat koordinasi dan konsultasi SKPD', '12 BULAN', 'Terlaksananya Administrasi Umum Perangkat Daerah', '100%', 1000000000, 1020000000, NULL, 2),
(20, '2', '16', '01', '06', '10', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'Terlaksananya Penatausahaan Arsip Dinamis pada SKPD', '12 BULAN', 'Terlaksananya Administrasi Umum Perangkat Daerah', '100%', 150000000, 153000000, NULL, 2),
(21, '2', '16', '01', '07', '05', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', 'tersedianya fasilitas mebel kantor', '12 BULAN', 'Terlaksananya Pengadaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah ', '100%', 300000000, 306000000, NULL, 2),
(22, '2', '16', '01', '07', '09', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', 'tersedianya Gedung Kantor atau Bangunan \nLainnya', '12 BULAN', 'Terlaksananya Pengadaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah ', '100%', 10700000000, 10914000000, NULL, 2),
(23, '2', '16', '01', '07', '11', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', 'tersedianya Sarana dan Prasarana Pendukung \nGedung Kantor atau Bangunan Lainnya', '12 BULAN', 'Terlaksananya Pengadaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah ', '100%', 500000000, 510000000, NULL, 2),
(24, '2', '16', '01', '08', '01', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'tersedianya jasa surat menyurat', '12 BULAN', 'Tersedianya Jasa Penunjang Urusan Pemerintah Daerah', '100%', 125000000, 127500000, NULL, 2),
(25, '2', '16', '01', '08', '02', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'Tersedianya jasa komunikasi, Sumber daya air, dan listrik', '12 BULAN', 'Tersedianya Jasa Penunjang Urusan Pemerintah Daerah', '100%', 5550000000, 5661000000, NULL, 2),
(26, '2', '16', '01', '08', '04', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Pelayanan Administrasi\nPerkantoran', '100%', 'tersedianya jasa pelayanan umum kantor', '12 BULAN', 'Tersedianya Jasa Penunjang Urusan Pemerintah Daerah', '100%', 375000000, 382500000, NULL, 2),
(27, '2', '16', '01', '09', '01', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', 'jumlah kendaraan dinas yang terpelihara dengan kondisi baik', '12 BULAN', 'Terlaksananya Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah', '100%', 400000000, 408000000, NULL, 2),
(28, '2', '16', '01', '09', '06', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', 'terpeliharanya peralatan dan mesin lainnya', '12 BULAN', 'Terlaksananya Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah', '100%', 200000000, 204000000, NULL, 2),
(29, '2', '16', '01', '09', '07', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', 'CCTV dapat di gunakan,Terpeliharanya Jaringan Internet Arfai Smart City,Jaringan Internet dapat di gunakan di sekolah', '3 Kegiatan', 'Terlaksananya Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah', '100%', 1200000000, 1224000000, NULL, 2),
(30, '2', '16', '01', '09', '08', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', 'Terpeliharanya Aplikasi Milik Pemprov Papua Barat', '1 Kegiatan', 'Terlaksananya Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah', '100%', 300000000, 306000000, NULL, 2),
(31, '2', '16', '01', '09', '09', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Meningkatnya Sarana dan Prasarana\nAparatur', '100%', '.terpeliharanya gedungkantor dag bangunan laiinya dalam kondisi baik', '12 BULAN', 'Terlaksananya Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah', '100%', 300000000, 306000000, NULL, 2),
(32, '2', '16', '02', '01', '02', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Terpantaunya Opini dan Aspirasi Publik se-Papua Barat', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 450000000, 459000000, NULL, 2),
(33, '2', '16', '02', '01', '03', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Terpantaunya Informasi dan penetapan agenda prioritas ', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 500000000, 510000000, NULL, 2),
(34, '2', '16', '02', '01', '08', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Terjaringnya Opini aspirasi Publik melalui FGD Jajak Pendapat dengan pemengku kepentingan', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 450000000, 459000000, NULL, 2),
(35, '2', '16', '02', '01', '09', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Tertatanya Manajemen Komunikasi Krisis ', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 500000000, 510000000, NULL, 2),
(36, '2', '16', '02', '01', '12', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Terjalinnya hubungan masyarakat media dan kemitraan komunitas', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 500000000, 510000000, NULL, 2),
(37, '2', '16', '02', '01', '06', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Tersedianya layanan Informasi publik Pemerintah daerah Provinsi Papua Barat', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 500000000, 510000000, NULL, 2),
(38, '2', '16', '02', '01', '10', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Tersedianya Sumber Daya  Pejabat pengelola Informasi dan dokumentasi (PPID) yang profesional dan handal', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 500000000, 510000000, NULL, 2),
(39, '2', '16', '02', '01', '11', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Tersedianya Sumber Daya Tata Kelola Komisi Informasi Papua Barat', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 650000000, 663000000, NULL, 2),
(40, '2', '16', '02', '01', '13', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Jaringan internet  dapat di gunakan di kediaman Gub Papua Barat di Mandopi,Jaringan Internet dapat di gunakan  ke DMPTSP,Jaringan Internet dapat di gunakan di ULP,Jaringan Internet dapat di gunakan di Unipa,Jaringan internet dapat digunakan di STMIK Creatindo,Vidiotron dapat digunakan di gedung PKK,Listrik Dapat Dinyalakan di gedung PKK,Perlengkapan Virtual untuk pimpinan dapat dipenuhi', '8 Kegiatan', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 4899000000, 4996980000, NULL, 2),
(41, '2', '16', '02', '01', '04', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Terkelolanya Konten Media Komunikasi Publik', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 650000000, 663000000, NULL, 2),
(42, '2', '16', '02', '01', '05', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan layanan Informasi dan Komunikasi Publik', '100%', 'Terlaksananya Peningkatan dan Pemeliharaan Media Center di Provinsi Papua Barat', '12 BULAN', 'Terlaksananya Pengelolaan Komunikasi Publik Pemerintah Daerah Provinsi', '100%', 5500000000, 5610000000, NULL, 2),
(43, '2', '16', '03', '01', '06', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Cakupan Pengembangan dan Peningkatan Pengelolaan Aplikasi Informatika', '100%', 'Rapat koordinasi Penyelenggara SPBE Pemerintah Provinsi Papua Barat', '1 Kegiatan', 'Pengembangan Aplikasidan Proses Bisnis Pemerintahan Berbasis Elektronik', '100%', 200000000, 204000000, NULL, 2),
(44, '2', '16', '03', '01', '07', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Cakupan Pengembangan dan Peningkatan Pengelolaan Aplikasi Informatika', '100%', 'Setiap OPD memiliki Operator Website dan Operator JDIH yang handal', '1 Kegiatan', 'Pengembangan Aplikasi dan Proses Bisnis Pemerintahan Berbasis Elektronik', '100%', 1000000000, 1020000000, NULL, 2),
(45, '2', '16', '03', '01', '10', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '002', 'Cakupan Pengembangan dan Peningkatan Pengelolaan Aplikasi Informatika', '100%', 'Terlaksananya Asesment manajemen tata kelola TIK di Seluruh kab/kota se provinsi papua barat', '11 Kab/1 Kota', 'Pengembangan Aplikasi dan Proses Bisnis Pemerintahan Berbasis Elektronik', '100%', 300000000, 306000000, NULL, 2),
(46, '2', '16', '03', '01', '12', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Cakupan Pengembangan dan Peningkatan Pengelolaan Aplikasi Informatika', '100%', 'Hasil Evaluasi SPBE Pemprov Papua Barat tahun 2022 dapat meningkat', '1 Kegiatan', 'Pengembangan Aplikasi dan Proses Bisnis Pemerintahan Berbasis Elektronik', '100%', 300000000, 306000000, NULL, 2),
(47, '2', '16', '03', '01', '04', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Terwujudnya koneksitas jaringan komunikasi dan pelayanan informasi publik berbasis IT', '001', 'Cakupan Pengembangan dan Peningkatan Pengelolaan Aplikasi Informatika', '100%', 'tersedianya aplikasi bank data kesehatan terpadu', '1 Aplikasi', 'Pengembangan Aplikasi dan Proses Bisnis Pemerintahan Berbasis Elektronik', '100%', 450000000, 459000000, NULL, 2),
(48, '2', '20', '02', '01', '01', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya \nketersediaan data \nsebagai basis \nkebijakan \npembangunan daerah', '002', 'Penyesuaian Data Statistik Sektoral', '100%', 'Terlaksananya Koordinasi, Pengumpula Data', '12 BULAN', 'Terlaksananya Pelaksanaan Satu Data Sektoral Papua Barat', '100%', 450000000, 459000000, NULL, 2),
(49, '2', '20', '02', '01', '02', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya \nketersediaan data \nsebagai basis \nkebijakan \npembangunan daerah', '002', 'Penyesuaian Data Statistik Sektoral', '100%', 'Tersedianya SDM', '12 BULAN', 'Terlaksananya Pelaksanaan Satu Data Sektoral Papua Barat', '100%', 410000000, 418200000, NULL, 2),
(50, '2', '20', '02', '01', '03', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya \nketersediaan data \nsebagai basis \nkebijakan \npembangunan daerah', '002', 'Penyesuaian Data Statistik Sektoral', '100%', 'Pengembangan Meta Data Satistik', '12 BULAN', 'Terlaksananya Pelaksanaan Satu Data Sektoral Papua Barat', '100%', 500000000, 510000000, NULL, 2),
(51, '2', '20', '02', '01', '04', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya \nketersediaan data \nsebagai basis \nkebijakan \npembangunan daerah', '002', 'Penyesuaian Data Statistik Sektoral', '100%', 'Peningkatan kelelmbagaan Statistik', '12 BULAN', 'Terlaksananya Pelaksanaan Satu Data Sektoral Papua Barat', '100%', 500000000, 510000000, NULL, 2),
(52, '2', '20', '02', '01', '05', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya \nketersediaan data \nsebagai basis \nkebijakan \npembangunan daerah', '002', 'Penyesuaian Data Statistik Sektoral', '100%', 'Pengembangan infrastruktur Daerah', '12 BULAN', 'Terlaksananya Pelaksanaan Satu Data Sektoral Papua Barat', '100%', 500000000, 510000000, NULL, 2),
(53, '2', '20', '02', '01', '06', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Meningkatnya \nketersediaan data \nsebagai basis \nkebijakan \npembangunan daerah', '002', 'Penyesuaian Data Statistik Sektoral', '100%', 'Otoritas Statistik Sektoral Daerah', '12 BULAN', 'Terlaksananya Pelaksanaan Satu Data Sektoral Papua Barat', '100%', 450000000, 459000000, NULL, 2),
(54, '2', '21', '02', '01', '01', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Optimalnya \npemanfaatan dan \npengelolaan \npersandian daerah', '002', 'Pengamanan Informasi SPBE Daerah Provinsi Papua Barat', '90%', 'Penata Kelolaan admistrasi persandian', '12 BULAN', 'Terlaksananya Keamanan Informasi SPBE Daerah Provinsi Papua Barat', '90%', 450000000, 459000000, NULL, 2),
(55, '2', '21', '02', '01', '02', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Optimalnya \npemanfaatan dan \npengelolaan \npersandian daerah', '002', 'Pengamanan Informasi SPBE Daerah Provinsi Papua Barat', '90%', 'Peningkatan SDM Sandi', '12 BULAN', 'Terlaksananya Keamanan Informasi SPBE Daerah Provinsi Papua Barat', '90%', 450000000, 459000000, NULL, 2),
(56, '2', '21', '02', '01', '03', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Optimalnya \npemanfaatan dan \npengelolaan \npersandian daerah', '002', 'Pengamanan Informasi SPBE Daerah Provinsi Papua Barat', '90%', 'Monitoring dan Evaluasi Penyelenggaraan Persandian pada Pemerintah daerah', '12 BULAN', 'Terlaksananya Keamanan Informasi SPBE Daerah Provinsi Papua Barat', '90%', 600000000, 612000000, NULL, 2),
(57, '2', '21', '02', '01', '04', 'Terwujudnya pengelolaan data dan informasi layanan publik yang terintegrasi dan berbasis IT', 'Optimalnya \npemanfaatan dan \npengelolaan \npersandian daerah', '002', 'Pengamanan Informasi SPBE Daerah Provinsi Papua Barat', '90%', 'Layanan Keamanan Informasi', '12 BULAN', 'Terlaksananya Keamanan Informasi SPBE Daerah Provinsi Papua Barat', '90%', 600000000, 612000000, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rumusan_masalah`
--

CREATE TABLE `rumusan_masalah` (
  `id_rumusan` int(11) NOT NULL,
  `id_masalah_pokok` int(11) NOT NULL,
  `uraian_masalah` text NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_rpjmd`
--

CREATE TABLE `setting_rpjmd` (
  `id_rpjmd` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tahun_mulai` int(6) NOT NULL,
  `tahun_selesai` int(6) NOT NULL,
  `visi` text NOT NULL,
  `id_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_rpjmd`
--

INSERT INTO `setting_rpjmd` (`id_rpjmd`, `kode`, `tahun_mulai`, `tahun_selesai`, `visi`, `id_status`) VALUES
(1, '20172023', 2017, 2023, 'MENUJU PAPUA BARAT YANG AMAN, SEJAHTERA, DAN BERMARTABAT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `status_rpjmd`
--

CREATE TABLE `status_rpjmd` (
  `id_status` int(3) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_rpjmd`
--

INSERT INTO `status_rpjmd` (`id_status`, `status`) VALUES
(0, 'Non-Aktif'),
(1, 'Non-aktif');

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

--
-- Dumping data for table `sub_kegiatan`
--

INSERT INTO `sub_kegiatan` (`id`, `kode_urusan`, `kode_bidang`, `kode_program`, `kode_kegiatan`, `kode_sub_kegiatan`, `sub_kegiatan`, `id_unit_organisasi`) VALUES
(1, '2', '16', '01', '01', '01', 'Penyusunan Dokumen\nPerencanaan Perangkat\nDaerah\n', 2),
(2, '2', '16', '01', '01', '02', 'Koordinasi dan\nPenyusunan Dokumen\nRKA-SKPD\n\n\n', 2),
(3, '2', '16', '01', '01', '06', 'Koordinasi dan\nPenyusunan Laporan\nCapaian Kinerja dan\nIkhtisar Realisasi Kinerja\nSKPD', 2),
(4, '2', '16', '01', '01', '07', 'Evaluasi Kinerja Perangkat Daerah', 2),
(5, '2', '16', '01', '02', '01', 'Penyediaan Gaji dan Tunjangan ASN', 2),
(6, '2', '16', '01', '02', '02', 'Penyediaan Administrasi Pelaksanaan Tugas ASN', 2),
(7, '2', '16', '01', '02', '05', 'Koordinasi dan Penyusunan Laporan Keuangan Akhir Tahun SKPD', 2),
(8, '2', '16', '01', '03', '02', 'Pengamanan Barang Milik Daerah SKPD', 2),
(9, '2', '16', '01', '05', '02', 'Pengadaan Pakaian Dinas Beserta Atribut Kelengkapannya', 2),
(10, '2', '16', '01', '05', '9', 'Pendidikan dan Pelatihan Pegawai Berdasarkan Tugas dan Fungsi', 2),
(11, '2', '16', '01', '05', '10', 'Sosialisasi Peraturan Perundang-Undangan', 2),
(12, '2', '16', '01', '05', '11', 'Bimbingan Teknis\nImplementasi Peraturan Perundang-Undangan', 2),
(13, '2', '16', '01', '06', '04', 'Penyediaan Bahan Logistik Kantor', 2),
(14, '2', '16', '01', '06', '05', 'Penyediaan Barang Cetakan dan Penggandaan', 2),
(15, '2', '16', '01', '06', '06', 'Penyediaan Bahan Bacaan dan Peraturan Perundang-undangan', 2),
(16, '2', '16', '01', '06', '08', 'Fasilitasi Kunjungan Tamu', 2),
(17, '2', '16', '01', '06', '09', 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD', 2),
(18, '2', '16', '01', '06', '10', 'Penatausahaan Arsip Dinamis pada SKPD', 2),
(19, '2', '16', '01', '07', '05', 'Pengadaan Mebel', 2),
(20, '2', '16', '01', '07', '09', 'Pengadaan Gedung Kantor atau Bangunan \nLainnya', 2),
(21, '2', '16', '01', '07', '11', 'Pengadaan Sarana dan Prasarana Pendukung \nGedung Kantor atau Bangunan Lainnya', 2),
(22, '2', '16', '01', '08', '01', 'Penyediaan Jasa Surat Menyurat', 2),
(23, '2', '16', '01', '08', '02', 'Penyediaan Jasa\nKomunikasi, Sumber Daya Air dan Listrik', 2),
(24, '2', '16', '01', '08', '04', 'Penyediaan Jasa Pelayanan Umum Kantor', 2),
(25, '2', '16', '01', '09', '01', 'Penyediaan Jasa Pemeliharaan, Biaya Pemeliharaan dan Pajak Kendaraan  Perorangan Dinas atau Kendaraan Dinas  Jabatan', 2),
(26, '2', '16', '01', '09', '06', 'Pemeliharaan Peralatan dan Mesin Lainnya', 2),
(27, '2', '16', '01', '09', '07', 'Pemeliharaan Aset Tetap Lainnya', 2),
(28, '2', '16', '01', '09', '08', 'Pemeliharaan Aset Tak Berwujud', 2),
(29, '2', '16', '01', '09', '09', 'Pemeliharaan/Rehabilitasi Gedung Kantor dan Bangunan Lainnya', 2),
(30, '2', '16', '02', '01', '02', 'Monitoring Opini dan Aspirasi Publik', 2),
(31, '2', '16', '02', '01', '03', 'Monitoring Informasi dan Penetapan Agenda \nPrioritas Komunikasi Pemerintah Daerah', 2),
(32, '2', '16', '02', '01', '08', 'Kemitraan dengan Pemangku Kepentingan', 2),
(33, '2', '16', '02', '01', '09', 'Manajemen Komunikasi Krisis', 2),
(34, '2', '16', '02', '01', '12', 'Penyelenggaraan Hubungan Masyarakat, Media \ndan Kemitraan Komunitas', 2),
(35, '2', '16', '02', '01', '06', 'Pelayanan Informasi Publik', 2),
(36, '2', '16', '02', '01', '10', 'Penguatan Kapasitas Sumber Daya Komunikasi \nPublik', 2),
(37, '2', '16', '02', '01', '11', 'Penguatan Tata Kelola Komisi Informasi di Daerah', 2),
(38, '2', '16', '02', '01', '13', 'Penyediaan/Pengadaan Sarana dan Prasarana Pendukung Informasi dan Komunikasi Publik Pemerintah Daerah Provinsi', 2),
(39, '2', '16', '02', '01', '04', 'Pengelolaan Konten dan Perencanaan Media \nKomunikasi Publik', 2),
(40, '2', '16', '02', '01', '05', 'Pengelolaan Media Komunikasi Publik', 2),
(41, '2', '16', '03', '01', '06', 'Koordinasi dan Sinkronisasi Data dan Informasi Elektronik', 2),
(42, '2', '16', '03', '01', '07', 'Pengembangan Aplikasi dan Proses Bisnis Pemerintahan Berbasis Elektronik', 2),
(43, '2', '16', '03', '01', '10', 'Pengembangan dan Pengelolaan Sumber Daya Teknologi Informasi dan Komunikasi Pemerintah Daerah', 2),
(44, '2', '16', '03', '01', '12', 'Monitoring Evaluasi dan Pelaporan Pengembangan Ekosistem SPBE', 2),
(45, '2', '16', '03', '01', '04', 'Penyelenggaraan Sistem Penghubung Layanan Pemerintah', 2),
(46, '2', '20', '02', '01', '01', 'Koordinasi dan Sinkronisasi Pengumpulan, Pengolahan, Analisis dan Diseminasi Data Statistik Sektoral', 2),
(47, '2', '20', '02', '01', '02', 'Peningkatan Kapasitas SDM Pemerintah dalam Peningkatan Mutu Statistik Daerah yang terintegrasi', 2),
(48, '2', '20', '02', '01', '03', 'Membangun Meta data Statistik Sektoral', 2),
(49, '2', '20', '02', '01', '04', 'Peningkatan Kapasitas Kelembagaan statistik Sektoral', 2),
(50, '2', '20', '02', '01', '05', 'Pengembangan Infrastruktur', 2),
(51, '2', '20', '02', '01', '06', 'Penyelenggaraan Otoritas Statistik Sektoral di Daerah', 2),
(52, '2', '21', '02', '01', '01', 'Penetapan Kebijakan Tata Kelola Keamanan \nInformasi dan Jaring Komunikasi Sandi \nPemerintah Daerah Provinsi ', 2),
(53, '2', '21', '02', '01', '02', 'Pelaksanaan Analisis Kebutuhan dan \nPengelolaan Sumber Daya Keamanan Informasi \nPemerintah Daerah Provinsi ', 2),
(54, '2', '21', '02', '01', '03', 'Pelaksanaan Keamanan Informasi \nPemerintahan Daerah Provinsi Berbasis \nElektronik dan Non Elektronik', 2),
(55, '2', '21', '02', '01', '04', 'Penyediaan Layanan Keamanan Informasi \nPemerintah Daerah Provinsi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `urusan`
--

CREATE TABLE `urusan` (
  `id` int(11) NOT NULL,
  `kode_urusan` varchar(3) NOT NULL,
  `urusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urusan`
--

INSERT INTO `urusan` (`id`, `kode_urusan`, `urusan`) VALUES
(1, '2', 'URUSAN PEMERINTAHAN WAJIB YANG TIDAK BERKAITAN DENGAN PELAYANAN DASAR');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
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
(2, 'Admin Kominfo', '19690310 199103 1 017', '', '082134777895', 2, 'admin.kominfo', '123', 1),
(3, 'Admin P.U', '', '', '081315667926', 1, 'admin.pu', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akar_masalah`
--
ALTER TABLE `akar_masalah`
  ADD PRIMARY KEY (`id_akar_masalah`);

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
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id_indikator`);

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
-- Indexes for table `keterkaitan_misi`
--
ALTER TABLE `keterkaitan_misi`
  ADD PRIMARY KEY (`id_keterkaitan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masalah_pokok`
--
ALTER TABLE `masalah_pokok`
  ADD PRIMARY KEY (`id_masalah`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id_misi`);

--
-- Indexes for table `misi_bidang`
--
ALTER TABLE `misi_bidang`
  ADD PRIMARY KEY (`id_misi_bidang`);

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
-- Indexes for table `rumusan_masalah`
--
ALTER TABLE `rumusan_masalah`
  ADD PRIMARY KEY (`id_rumusan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_rpjmd`
--
ALTER TABLE `setting_rpjmd`
  ADD PRIMARY KEY (`id_rpjmd`);

--
-- Indexes for table `status_rpjmd`
--
ALTER TABLE `status_rpjmd`
  ADD PRIMARY KEY (`id_status`);

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
-- AUTO_INCREMENT for table `akar_masalah`
--
ALTER TABLE `akar_masalah`
  MODIFY `id_akar_masalah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `keterkaitan_misi`
--
ALTER TABLE `keterkaitan_misi`
  MODIFY `id_keterkaitan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masalah_pokok`
--
ALTER TABLE `masalah_pokok`
  MODIFY `id_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id_misi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `misi_bidang`
--
ALTER TABLE `misi_bidang`
  MODIFY `id_misi_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `renja`
--
ALTER TABLE `renja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `rumusan_masalah`
--
ALTER TABLE `rumusan_masalah`
  MODIFY `id_rumusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_rpjmd`
--
ALTER TABLE `setting_rpjmd`
  MODIFY `id_rpjmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_rpjmd`
--
ALTER TABLE `status_rpjmd`
  MODIFY `id_status` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
