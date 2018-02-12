-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2018 at 07:14 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmmi1`
--

-- --------------------------------------------------------

--
-- Table structure for table `mmi_adjustment`
--

CREATE TABLE `mmi_adjustment` (
  `adjustment_id` int(11) NOT NULL,
  `adjustment_person_id` int(11) NOT NULL,
  `adjustment_debitur_id` int(11) NOT NULL,
  `adjustment_client_id` int(11) NOT NULL,
  `adjustment_person_name` varchar(50) NOT NULL,
  `banding1_jenis_properti` enum('1','2','3','4','5','6','7','8','9','10','11','12','13') NOT NULL DEFAULT '1',
  `banding1_alamat` text NOT NULL,
  `banding1_blok_no` varchar(25) NOT NULL,
  `banding1_kelurahan` varchar(10) NOT NULL,
  `banding1_kecamatan` varchar(10) NOT NULL,
  `banding1_kota` varchar(10) NOT NULL,
  `banding1_provinsi` varchar(10) NOT NULL,
  `banding1_jarak_dengan_aset` varchar(15) NOT NULL,
  `banding1_nama` varchar(50) NOT NULL,
  `banding1_telepon` char(13) NOT NULL,
  `banding1_keterangan` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `banding1_nilai_penawaran` char(15) NOT NULL,
  `banding1_tanggal_penawaran` date NOT NULL,
  `banding1_dokumen_tanah` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '1',
  `banding1_luas_tanah` int(8) NOT NULL,
  `banding1_bentuk_tanah` enum('B','KB','M','L','TRZ','TB') NOT NULL DEFAULT 'B',
  `banding1_frontage` int(5) NOT NULL,
  `banding1_lebar_jalan` int(5) NOT NULL,
  `banding1_letak_tanah` enum('T','S','TS','K','DU') NOT NULL DEFAULT 'T',
  `banding1_kondisi_lahan` enum('A','B','C','D','E') NOT NULL DEFAULT 'A',
  `banding1_peruntukan` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '3',
  `banding1_kontur_tanah` enum('dat','beg','ber','lan') NOT NULL DEFAULT 'dat',
  `banding1_kepadatan_bangunan` enum('T','S','R') NOT NULL DEFAULT 'S',
  `banding1_elevasi` decimal(15,2) NOT NULL,
  `banding1_luas_bangunan` int(8) NOT NULL,
  `banding2_jenis_properti` enum('1','2','3','4','5','6','7','8','9','10','11','12','13') NOT NULL DEFAULT '1',
  `banding2_alamat` text NOT NULL,
  `banding2_blok_no` varchar(8) NOT NULL,
  `banding2_kelurahan` varchar(10) NOT NULL,
  `banding2_kecamatan` varchar(10) NOT NULL,
  `banding2_kota` varchar(10) NOT NULL,
  `banding2_provinsi` varchar(10) NOT NULL,
  `banding2_jarak_dengan_aset` varchar(15) NOT NULL,
  `banding2_nama` varchar(50) NOT NULL,
  `banding2_telepon` char(13) NOT NULL,
  `banding2_keterangan` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `banding2_nilai_penawaran` char(15) NOT NULL,
  `banding2_tanggal_penawaran` date NOT NULL,
  `banding2_dokumen_tanah` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '1',
  `banding2_luas_tanah` int(8) NOT NULL,
  `banding2_bentuk_tanah` enum('B','KB','M','L','TRZ','TB') NOT NULL DEFAULT 'B',
  `banding2_frontage` int(5) NOT NULL,
  `banding2_lebar_jalan` int(5) NOT NULL,
  `banding2_letak_tanah` enum('T','S','TS','K','DU') NOT NULL DEFAULT 'T',
  `banding2_kondisi_lahan` enum('A','B','C','D','E') NOT NULL DEFAULT 'A',
  `banding2_peruntukan` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '3',
  `banding2_kontur_tanah` enum('dat','beg','ber','lan') NOT NULL DEFAULT 'dat',
  `banding2_kepadatan_bangunan` enum('T','S','R') NOT NULL DEFAULT 'S',
  `banding2_elevasi` decimal(15,2) NOT NULL,
  `banding2_luas_bangunan` int(8) NOT NULL,
  `banding3_jenis_properti` enum('1','2','3','4','5','6','7','8','9','10','11','12','13') NOT NULL DEFAULT '1',
  `banding3_alamat` text NOT NULL,
  `banding3_blok_no` varchar(8) NOT NULL,
  `banding3_kelurahan` varchar(10) NOT NULL,
  `banding3_kecamatan` varchar(10) NOT NULL,
  `banding3_kota` varchar(10) NOT NULL,
  `banding3_provinsi` varchar(10) NOT NULL,
  `banding3_jarak_dengan_aset` varchar(10) NOT NULL,
  `banding3_nama` varchar(50) NOT NULL,
  `banding3_telepon` char(13) NOT NULL,
  `banding3_keterangan` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `banding3_nilai_penawaran` char(15) NOT NULL,
  `banding3_tanggal_penawaran` date NOT NULL,
  `banding3_dokumen_tanah` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '1',
  `banding3_luas_tanah` int(8) NOT NULL,
  `banding3_bentuk_tanah` enum('B','KB','M','L','TRZ','TB') NOT NULL DEFAULT 'B',
  `banding3_frontage` int(5) NOT NULL,
  `banding3_lebar_jalan` int(5) NOT NULL,
  `banding3_letak_tanah` enum('T','S','TS','K','DU') NOT NULL DEFAULT 'T',
  `banding3_kondisi_lahan` enum('A','B','C','D','E') NOT NULL DEFAULT 'A',
  `banding3_peruntukan` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '3',
  `banding3_kontur_tanah` enum('dat','beg','ber','lan') NOT NULL DEFAULT 'dat',
  `banding3_kepadatan_bangunan` enum('T','S','R') NOT NULL DEFAULT 'S',
  `banding3_elevasi` decimal(15,2) NOT NULL,
  `banding3_luas_bangunan` int(8) NOT NULL,
  `person_was_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmi_adjustment`
--

INSERT INTO `mmi_adjustment` (`adjustment_id`, `adjustment_person_id`, `adjustment_debitur_id`, `adjustment_client_id`, `adjustment_person_name`, `banding1_jenis_properti`, `banding1_alamat`, `banding1_blok_no`, `banding1_kelurahan`, `banding1_kecamatan`, `banding1_kota`, `banding1_provinsi`, `banding1_jarak_dengan_aset`, `banding1_nama`, `banding1_telepon`, `banding1_keterangan`, `banding1_nilai_penawaran`, `banding1_tanggal_penawaran`, `banding1_dokumen_tanah`, `banding1_luas_tanah`, `banding1_bentuk_tanah`, `banding1_frontage`, `banding1_lebar_jalan`, `banding1_letak_tanah`, `banding1_kondisi_lahan`, `banding1_peruntukan`, `banding1_kontur_tanah`, `banding1_kepadatan_bangunan`, `banding1_elevasi`, `banding1_luas_bangunan`, `banding2_jenis_properti`, `banding2_alamat`, `banding2_blok_no`, `banding2_kelurahan`, `banding2_kecamatan`, `banding2_kota`, `banding2_provinsi`, `banding2_jarak_dengan_aset`, `banding2_nama`, `banding2_telepon`, `banding2_keterangan`, `banding2_nilai_penawaran`, `banding2_tanggal_penawaran`, `banding2_dokumen_tanah`, `banding2_luas_tanah`, `banding2_bentuk_tanah`, `banding2_frontage`, `banding2_lebar_jalan`, `banding2_letak_tanah`, `banding2_kondisi_lahan`, `banding2_peruntukan`, `banding2_kontur_tanah`, `banding2_kepadatan_bangunan`, `banding2_elevasi`, `banding2_luas_bangunan`, `banding3_jenis_properti`, `banding3_alamat`, `banding3_blok_no`, `banding3_kelurahan`, `banding3_kecamatan`, `banding3_kota`, `banding3_provinsi`, `banding3_jarak_dengan_aset`, `banding3_nama`, `banding3_telepon`, `banding3_keterangan`, `banding3_nilai_penawaran`, `banding3_tanggal_penawaran`, `banding3_dokumen_tanah`, `banding3_luas_tanah`, `banding3_bentuk_tanah`, `banding3_frontage`, `banding3_lebar_jalan`, `banding3_letak_tanah`, `banding3_kondisi_lahan`, `banding3_peruntukan`, `banding3_kontur_tanah`, `banding3_kepadatan_bangunan`, `banding3_elevasi`, `banding3_luas_bangunan`, `person_was_deleted`) VALUES
(26, 7, 53, 66, 'Trebol', '5', 'The Akasia Serenity', 'Blok B N', 'Jombang', 'Ciputat', 'Tanggerang', 'Banten', 'Sekitaran Aset', 'Bapak Tantan', '087809904499', '6', '1,428,000,000', '2018-01-21', '3', 91, 'B', 6, 5, 'T', 'A', '3', 'dat', 'S', '0.10', 69, '5', 'The Akasia Serenity', 'Blok C 1', 'Jombang', 'Ciputat', 'Tanggerang', 'Banten', 'Sekitar Aset', 'Tantan', '087819904499', '6', '1,471,144,000', '2018-01-21', '3', 101, 'B', 6, 5, 'T', 'A', '3', 'dat', 'S', '0.10', 63, '5', 'The Akasia Serenity', 'Blok C 1', 'Jombang', 'Ciputat', 'Tanggerang', 'Banten', 'Sekitar As', 'Tantan', '087809904499', '6', '1,471,144,000', '2017-12-21', '3', 97, 'B', 6, 6, 'S', 'A', '3', 'dat', 'S', '0.10', 69, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_admin`
--

CREATE TABLE `mmi_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmi_admin`
--

INSERT INTO `mmi_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(0, 'admin', '2aefc34200a294a3cc7db81b43a81873');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_banding`
--

CREATE TABLE `mmi_banding` (
  `banding_id` int(11) NOT NULL,
  `banding_jenis_properti` varchar(15) DEFAULT NULL,
  `banding_lokasi` text,
  `banding_alamat` text,
  `banding_jalan_blok` text,
  `banding_no_rumah` varchar(5) DEFAULT NULL,
  `banding_kelurahan` varchar(15) DEFAULT NULL,
  `banding_kecamatan` varchar(15) DEFAULT NULL,
  `banding_kota` varchar(15) DEFAULT NULL,
  `banding_provinsi` varchar(15) DEFAULT NULL,
  `banding_jarak_dng_aset` text NOT NULL,
  `banding_arah_dng_aset` varchar(20) DEFAULT NULL,
  `banding_nama_informan` varchar(50) DEFAULT NULL,
  `banding_telephone` char(15) DEFAULT NULL,
  `banding_keterangan_info` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `banding_harga` int(20) DEFAULT NULL,
  `banding_discount` int(5) DEFAULT NULL,
  `banding_tanggal` date DEFAULT NULL,
  `banding_luas_tanah` int(7) DEFAULT NULL,
  `banding_dokumen_tanah` enum('SHM','SHGB') NOT NULL DEFAULT 'SHM',
  `banding_no_sertifikat` varchar(20) NOT NULL,
  `banding_tanggal_terbit` date NOT NULL,
  `banding_no_gs_su` varchar(20) NOT NULL,
  `banding_tgl_gs_su` date NOT NULL,
  `banding_tgl_berlaku` date NOT NULL,
  `banding_an_sertifikat` varchar(15) NOT NULL,
  `banding_hub_dng_nasabah` enum('AA','BB','CC','DD','EE','FF','GG','HH') NOT NULL DEFAULT 'AA',
  `banding_frontage` varchar(5) DEFAULT NULL,
  `banding_leb_jln_dpn_aset` varchar(5) DEFAULT NULL,
  `banding_leb_jln_masuk` varchar(5) DEFAULT NULL,
  `banding_bntk_tanah` enum('B','TB','TRZ') NOT NULL DEFAULT 'B',
  `banding_posisi_lokasi` enum('T','S','TS','K','DU') NOT NULL DEFAULT 'T',
  `banding_kpdtan_bangunan` enum('T','S','R') NOT NULL DEFAULT 'T',
  `banding_ehtj` decimal(5,0) DEFAULT NULL,
  `banding_ehtl` decimal(5,0) NOT NULL,
  `banding_keadaan_hal` enum('TB','BT','TT') NOT NULL DEFAULT 'TB',
  `banding_topografi` enum('dat','beg','ber','lan') NOT NULL DEFAULT 'dat',
  `banding_luas_bangunan` char(10) DEFAULT NULL,
  `banding_jenis_tanah` enum('TD','SHW','RW','TBM') NOT NULL DEFAULT 'TD',
  `banding_peruntukan` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '1',
  `banding_kondisi_lahan` enum('A','B','C','D','E') NOT NULL DEFAULT 'A',
  `banding_kondisi_bangunan` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `banding_tahun_bangun` char(5) DEFAULT NULL,
  `person_was_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmi_banding`
--

INSERT INTO `mmi_banding` (`banding_id`, `banding_jenis_properti`, `banding_lokasi`, `banding_alamat`, `banding_jalan_blok`, `banding_no_rumah`, `banding_kelurahan`, `banding_kecamatan`, `banding_kota`, `banding_provinsi`, `banding_jarak_dng_aset`, `banding_arah_dng_aset`, `banding_nama_informan`, `banding_telephone`, `banding_keterangan_info`, `banding_harga`, `banding_discount`, `banding_tanggal`, `banding_luas_tanah`, `banding_dokumen_tanah`, `banding_no_sertifikat`, `banding_tanggal_terbit`, `banding_no_gs_su`, `banding_tgl_gs_su`, `banding_tgl_berlaku`, `banding_an_sertifikat`, `banding_hub_dng_nasabah`, `banding_frontage`, `banding_leb_jln_dpn_aset`, `banding_leb_jln_masuk`, `banding_bntk_tanah`, `banding_posisi_lokasi`, `banding_kpdtan_bangunan`, `banding_ehtj`, `banding_ehtl`, `banding_keadaan_hal`, `banding_topografi`, `banding_luas_bangunan`, `banding_jenis_tanah`, `banding_peruntukan`, `banding_kondisi_lahan`, `banding_kondisi_bangunan`, `banding_tahun_bangun`, `person_was_deleted`) VALUES
(1, 'Ruko 2 Lantai', 'Kav. Serut Jaya', NULL, 'Jl. Serut Raya Blok B1', '3', 'Pejuang', 'Medan Satria', 'Bekasi', 'Jawa Barat', '5', 'Sekitar Aset', 'Bapak Adi', '085780729099', '6', 650000, 20, '2017-11-03', 73, 'SHM', '12313', '2017-11-27', '123412321', '2017-11-14', '2017-11-15', 'Sumidi', 'CC', '6', '5', '6', 'B', 'T', 'S', '0', '5', 'TB', 'dat', '112', 'TD', '3', 'A', '1', '2016', 'N'),
(2, 'Rumah Tinkat 2 ', '123', NULL, '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '1', 123, 123, '2018-01-12', 123, 'SHM', '123', '2018-01-09', '123', '2018-01-23', '2018-01-30', '123124', 'AA', '123', '12351', '12515', 'B', 'T', 'T', '12512', '12415', 'TB', 'dat', '13512', 'TD', '1', 'A', '1', '1231', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_btb`
--

CREATE TABLE `mmi_btb` (
  `btb_id` int(11) NOT NULL,
  `btb_provinsi` varchar(20) NOT NULL,
  `rt_ekslusif_pondasi_1lt` int(11) NOT NULL,
  `rt_ekslusif_struktur_1lt` int(11) NOT NULL,
  `rt_ekslusif_rangka_atap_1lt` int(11) NOT NULL,
  `rt_ekslusif_penutup_atap_1lt` int(11) NOT NULL,
  `rt_ekslusif_plafond_1lt` int(11) NOT NULL,
  `rt_ekslusif_dinding_1lt` int(11) NOT NULL,
  `rt_ekslusif_pintu_jendela_1lt` int(11) NOT NULL,
  `rt_ekslusif_lantai_1lt` int(11) NOT NULL,
  `rt_ekslusif_utilitas_1lt` int(11) NOT NULL,
  `rt_ekslusif_profesional_fee_1lt` int(11) NOT NULL,
  `rt_ekslusif_biaya_perijinan_1lt` int(11) NOT NULL,
  `rt_ekslusif_keuntungan_kontraktor_1lt` int(11) NOT NULL,
  `rt_mewah_pondasi_1lt` int(20) NOT NULL,
  `rt_mewah_struktur_1lt` int(20) NOT NULL,
  `rt_mewah_rangka_atap_1lt` int(20) NOT NULL,
  `rt_mewah_penutup_atap_1lt` int(20) NOT NULL,
  `rt_mewah_plafond_1lt` int(20) NOT NULL,
  `rt_mewah_dinding_1lt` int(20) NOT NULL,
  `rt_mewah_pintu_jendela_1lt` int(20) NOT NULL,
  `rt_mewah_lantai_1lt` int(20) NOT NULL,
  `rt_mewah_utilitas_1lt` int(20) NOT NULL,
  `rt_mewah_profesional_fee_1lt` int(20) NOT NULL,
  `rt_mewah_biaya_perijinan_1lt` int(20) NOT NULL,
  `rt_mewah_keuntungan_kontraktor_1lt` int(20) NOT NULL,
  `rt_menengah_pondasi_1lt` int(11) NOT NULL,
  `rt_menengah_struktur_1lt` int(20) NOT NULL,
  `rt_menengah_rangka_atap_1lt` int(20) NOT NULL,
  `rt_menengah_penutup_atap_1lt` int(20) NOT NULL,
  `rt_menengah_plafond_1lt` int(20) NOT NULL,
  `rt_menengah_dinding_1lt` int(20) NOT NULL,
  `rt_menengah_pintu_jendela_1lt` int(20) NOT NULL,
  `rt_menengah_lantai_1lt` int(20) NOT NULL,
  `rt_menengah_utilitas_1lt` int(20) NOT NULL,
  `rt_menengah_profesional_fee_1lt` int(20) NOT NULL,
  `rt_menengah_biaya_perijinan_1lt` int(20) NOT NULL,
  `rt_menengah_keuntungan_kontraktor_1lt` int(20) NOT NULL,
  `rt_sederhana_pondasi_1lt` int(20) NOT NULL,
  `rt_sederhana_struktur_1lt` int(20) NOT NULL,
  `rt_sederhana_rangka_atap_1lt` int(20) NOT NULL,
  `rt_sederhana_penutup_atap_1lt` int(20) NOT NULL,
  `rt_sederhana_plafond_1lt` int(20) NOT NULL,
  `rt_sederhana_dinding_1lt` int(20) NOT NULL,
  `rt_sederhana_pintu_jendela_1lt` int(20) NOT NULL,
  `rt_sederhana_lantai_1lt` int(20) NOT NULL,
  `rt_sederhana_utilitas_1lt` int(20) NOT NULL,
  `rt_sederhana_profesional_fee_1lt` int(20) NOT NULL,
  `rt_sederhana_biaya_perijinan_1lt` int(20) NOT NULL,
  `rt_sederhana_keuntungan_kontraktor_1lt` int(20) NOT NULL,
  `rt_ekslusif_pondasi_2lt` int(20) NOT NULL,
  `rt_ekslusif_struktur_2lt` int(11) NOT NULL,
  `rt_ekslusif_rangka_atap_2lt` int(11) NOT NULL,
  `rt_ekslusif_penutup_atap_2lt` int(11) NOT NULL,
  `rt_ekslusif_plafond_2lt` int(11) NOT NULL,
  `rt_ekslusif_dinding_2lt` int(20) NOT NULL,
  `rt_ekslusif_pintu_jendela_2lt` int(20) NOT NULL,
  `rt_ekslusif_lantai_2lt` int(20) NOT NULL,
  `rt_ekslusif_utilitas_2lt` int(20) NOT NULL,
  `rt_ekslusif_profesional_fee_2lt` int(20) NOT NULL,
  `rt_ekslusif_biaya_perijinan_2lt` int(20) NOT NULL,
  `rt_ekslusif_keuntungan_kontraktor_2lt` int(20) NOT NULL,
  `rt_mewah_pondasi_2lt` int(20) NOT NULL,
  `rt_mewah_struktur_2lt` int(20) NOT NULL,
  `rt_mewah_rangka_atap_2lt` int(20) NOT NULL,
  `rt_mewah_penutup_atap_2lt` int(20) NOT NULL,
  `rt_mewah_plafond_2lt` int(20) NOT NULL,
  `rt_mewah_dinding_2lt` int(20) NOT NULL,
  `rt_mewah_pintu_jendela_2lt` int(20) NOT NULL,
  `rt_mewah_lantai_2lt` int(20) NOT NULL,
  `rt_mewah_utilitas_2lt` int(20) NOT NULL,
  `rt_mewah_profesional_fee_2lt` int(20) NOT NULL,
  `rt_mewah_biaya_perijinan_2lt` int(20) NOT NULL,
  `rt_mewah_keuntungan_kontraktor_2lt` int(20) NOT NULL,
  `rt_menengah_pondasi_2lt` int(20) NOT NULL,
  `rt_menengah_struktur_2lt` int(20) NOT NULL,
  `rt_menengah_rangka_atap_2lt` int(20) NOT NULL,
  `rt_menengah_penutup_atap_2lt` int(20) NOT NULL,
  `rt_menengah_plafond_2lt` int(20) NOT NULL,
  `rt_menengah_dinding_2lt` int(20) NOT NULL,
  `rt_menengah_pintu_jendela_2lt` int(20) NOT NULL,
  `rt_menengah_lantai_2lt` int(20) NOT NULL,
  `rt_menengah_utilitas_2lt` int(20) NOT NULL,
  `rt_menengah_profesional_fee_2lt` int(20) NOT NULL,
  `rt_menengah_biaya_perijinan_2lt` int(20) NOT NULL,
  `rt_menengah_keuntungan_kontraktor_2lt` int(20) NOT NULL,
  `rt_sederhana_pondasi_2lt` int(20) NOT NULL,
  `rt_sederhana_struktur_2lt` int(20) NOT NULL,
  `rt_sederhana_rangka_atap_2lt` int(20) NOT NULL,
  `rt_sederhana_penutup_atap_2lt` int(20) NOT NULL,
  `rt_sederhana_plafond_2lt` int(20) NOT NULL,
  `rt_sederhana_dinding_2lt` int(20) NOT NULL,
  `rt_sederhana_pintu_jendela_2lt` int(20) NOT NULL,
  `rt_sederhana_lantai_2lt` int(20) NOT NULL,
  `rt_sederhana_utilitas_2lt` int(20) NOT NULL,
  `rt_sederhana_profesional_fee_2lt` int(20) NOT NULL,
  `rt_sederhana_biaya_perijinan_2lt` int(20) NOT NULL,
  `rt_sederhana_keuntungan_kontraktor_2lt` int(20) NOT NULL,
  `bp_pondasi` int(20) NOT NULL,
  `bp_struktur` int(20) NOT NULL,
  `bp_rangka_atap` int(20) NOT NULL,
  `bp_penutup_atap` int(20) NOT NULL,
  `bp_plafond` int(20) NOT NULL,
  `bp_dinding` int(20) NOT NULL,
  `bp_pintu_jendela` int(20) NOT NULL,
  `bp_lantai` int(20) NOT NULL,
  `bp_utilitas` int(20) NOT NULL,
  `bp_profesional_fee` int(20) NOT NULL,
  `bp_biaya_perijinan` int(20) NOT NULL,
  `bp_keuntungan_kontraktor` int(20) NOT NULL,
  `gudang_pondasi` int(20) NOT NULL,
  `gudang_struktur` int(20) NOT NULL,
  `gudang_rangka_atap` int(20) NOT NULL,
  `gudang_penutup_atap` int(20) NOT NULL,
  `gudang_dinding` int(20) NOT NULL,
  `gudang_pintu_jendela` int(20) NOT NULL,
  `gudang_lantai` int(20) NOT NULL,
  `gudang_utilitas` int(20) NOT NULL,
  `gudang_profesional_fee` int(20) NOT NULL,
  `gudang_biaya_perijinan` int(20) NOT NULL,
  `gudang_keuntungan_kontraktor` int(20) NOT NULL,
  `bgb_rendah_pondasi` int(20) NOT NULL,
  `bgb_rendah_struktur` int(20) NOT NULL,
  `bgb_rendah_penutup_atap` int(20) NOT NULL,
  `bgb_rendah_plafond` int(20) NOT NULL,
  `bgb_rendah_dinding` int(20) NOT NULL,
  `bgb_rendah_pintu_jendela` int(20) NOT NULL,
  `bgb_rendah_lantai` int(20) NOT NULL,
  `bgb_rendah_utilitas` int(20) NOT NULL,
  `bgb_rendah_profesional_fee` int(20) NOT NULL,
  `bgb_rendah_biaya_perijinan` int(20) NOT NULL,
  `bgb_rendah_keuntungan_kontraktor` int(20) NOT NULL,
  `bgb_sedang_pondasi` int(20) NOT NULL,
  `bgb_sedang_struktur` int(20) NOT NULL,
  `bgb_sedang_penutup_atap` int(20) NOT NULL,
  `bgb_sedang_plafond` int(20) NOT NULL,
  `bgb_sedang_dinding` int(20) NOT NULL,
  `bgb_sedang_pintu_jendela` int(20) NOT NULL,
  `bgb_sedang_lantai` int(20) NOT NULL,
  `bgb_sedang_utilitas` int(20) NOT NULL,
  `bgb_sedang_profesional_fee` int(20) NOT NULL,
  `bgb_sedang_biaya_perijinan` int(20) NOT NULL,
  `bgb_sedang_keuntungan_kontraktor` int(20) NOT NULL,
  `bgb_tinggi_pondasi` int(20) NOT NULL,
  `bgb_tinggi_struktur` int(20) NOT NULL,
  `bgb_tinggi_penutup_atap` int(20) NOT NULL,
  `bgb_tinggi_plafond` int(20) NOT NULL,
  `bgb_tinggi_dinding` int(20) NOT NULL,
  `bgb_tinggi_pintu_jendela` int(20) NOT NULL,
  `bgb_tinggi_lantai` int(20) NOT NULL,
  `bgb_tinggi_utilitas` int(20) NOT NULL,
  `bgb_tinggi_profesional_fee` int(20) NOT NULL,
  `bgb_tinggi_biaya_perijinan` int(20) NOT NULL,
  `bgb_tinggi_keuntungan_kontraktor` int(20) NOT NULL,
  `person_was_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmi_btb`
--

INSERT INTO `mmi_btb` (`btb_id`, `btb_provinsi`, `rt_ekslusif_pondasi_1lt`, `rt_ekslusif_struktur_1lt`, `rt_ekslusif_rangka_atap_1lt`, `rt_ekslusif_penutup_atap_1lt`, `rt_ekslusif_plafond_1lt`, `rt_ekslusif_dinding_1lt`, `rt_ekslusif_pintu_jendela_1lt`, `rt_ekslusif_lantai_1lt`, `rt_ekslusif_utilitas_1lt`, `rt_ekslusif_profesional_fee_1lt`, `rt_ekslusif_biaya_perijinan_1lt`, `rt_ekslusif_keuntungan_kontraktor_1lt`, `rt_mewah_pondasi_1lt`, `rt_mewah_struktur_1lt`, `rt_mewah_rangka_atap_1lt`, `rt_mewah_penutup_atap_1lt`, `rt_mewah_plafond_1lt`, `rt_mewah_dinding_1lt`, `rt_mewah_pintu_jendela_1lt`, `rt_mewah_lantai_1lt`, `rt_mewah_utilitas_1lt`, `rt_mewah_profesional_fee_1lt`, `rt_mewah_biaya_perijinan_1lt`, `rt_mewah_keuntungan_kontraktor_1lt`, `rt_menengah_pondasi_1lt`, `rt_menengah_struktur_1lt`, `rt_menengah_rangka_atap_1lt`, `rt_menengah_penutup_atap_1lt`, `rt_menengah_plafond_1lt`, `rt_menengah_dinding_1lt`, `rt_menengah_pintu_jendela_1lt`, `rt_menengah_lantai_1lt`, `rt_menengah_utilitas_1lt`, `rt_menengah_profesional_fee_1lt`, `rt_menengah_biaya_perijinan_1lt`, `rt_menengah_keuntungan_kontraktor_1lt`, `rt_sederhana_pondasi_1lt`, `rt_sederhana_struktur_1lt`, `rt_sederhana_rangka_atap_1lt`, `rt_sederhana_penutup_atap_1lt`, `rt_sederhana_plafond_1lt`, `rt_sederhana_dinding_1lt`, `rt_sederhana_pintu_jendela_1lt`, `rt_sederhana_lantai_1lt`, `rt_sederhana_utilitas_1lt`, `rt_sederhana_profesional_fee_1lt`, `rt_sederhana_biaya_perijinan_1lt`, `rt_sederhana_keuntungan_kontraktor_1lt`, `rt_ekslusif_pondasi_2lt`, `rt_ekslusif_struktur_2lt`, `rt_ekslusif_rangka_atap_2lt`, `rt_ekslusif_penutup_atap_2lt`, `rt_ekslusif_plafond_2lt`, `rt_ekslusif_dinding_2lt`, `rt_ekslusif_pintu_jendela_2lt`, `rt_ekslusif_lantai_2lt`, `rt_ekslusif_utilitas_2lt`, `rt_ekslusif_profesional_fee_2lt`, `rt_ekslusif_biaya_perijinan_2lt`, `rt_ekslusif_keuntungan_kontraktor_2lt`, `rt_mewah_pondasi_2lt`, `rt_mewah_struktur_2lt`, `rt_mewah_rangka_atap_2lt`, `rt_mewah_penutup_atap_2lt`, `rt_mewah_plafond_2lt`, `rt_mewah_dinding_2lt`, `rt_mewah_pintu_jendela_2lt`, `rt_mewah_lantai_2lt`, `rt_mewah_utilitas_2lt`, `rt_mewah_profesional_fee_2lt`, `rt_mewah_biaya_perijinan_2lt`, `rt_mewah_keuntungan_kontraktor_2lt`, `rt_menengah_pondasi_2lt`, `rt_menengah_struktur_2lt`, `rt_menengah_rangka_atap_2lt`, `rt_menengah_penutup_atap_2lt`, `rt_menengah_plafond_2lt`, `rt_menengah_dinding_2lt`, `rt_menengah_pintu_jendela_2lt`, `rt_menengah_lantai_2lt`, `rt_menengah_utilitas_2lt`, `rt_menengah_profesional_fee_2lt`, `rt_menengah_biaya_perijinan_2lt`, `rt_menengah_keuntungan_kontraktor_2lt`, `rt_sederhana_pondasi_2lt`, `rt_sederhana_struktur_2lt`, `rt_sederhana_rangka_atap_2lt`, `rt_sederhana_penutup_atap_2lt`, `rt_sederhana_plafond_2lt`, `rt_sederhana_dinding_2lt`, `rt_sederhana_pintu_jendela_2lt`, `rt_sederhana_lantai_2lt`, `rt_sederhana_utilitas_2lt`, `rt_sederhana_profesional_fee_2lt`, `rt_sederhana_biaya_perijinan_2lt`, `rt_sederhana_keuntungan_kontraktor_2lt`, `bp_pondasi`, `bp_struktur`, `bp_rangka_atap`, `bp_penutup_atap`, `bp_plafond`, `bp_dinding`, `bp_pintu_jendela`, `bp_lantai`, `bp_utilitas`, `bp_profesional_fee`, `bp_biaya_perijinan`, `bp_keuntungan_kontraktor`, `gudang_pondasi`, `gudang_struktur`, `gudang_rangka_atap`, `gudang_penutup_atap`, `gudang_dinding`, `gudang_pintu_jendela`, `gudang_lantai`, `gudang_utilitas`, `gudang_profesional_fee`, `gudang_biaya_perijinan`, `gudang_keuntungan_kontraktor`, `bgb_rendah_pondasi`, `bgb_rendah_struktur`, `bgb_rendah_penutup_atap`, `bgb_rendah_plafond`, `bgb_rendah_dinding`, `bgb_rendah_pintu_jendela`, `bgb_rendah_lantai`, `bgb_rendah_utilitas`, `bgb_rendah_profesional_fee`, `bgb_rendah_biaya_perijinan`, `bgb_rendah_keuntungan_kontraktor`, `bgb_sedang_pondasi`, `bgb_sedang_struktur`, `bgb_sedang_penutup_atap`, `bgb_sedang_plafond`, `bgb_sedang_dinding`, `bgb_sedang_pintu_jendela`, `bgb_sedang_lantai`, `bgb_sedang_utilitas`, `bgb_sedang_profesional_fee`, `bgb_sedang_biaya_perijinan`, `bgb_sedang_keuntungan_kontraktor`, `bgb_tinggi_pondasi`, `bgb_tinggi_struktur`, `bgb_tinggi_penutup_atap`, `bgb_tinggi_plafond`, `bgb_tinggi_dinding`, `bgb_tinggi_pintu_jendela`, `bgb_tinggi_lantai`, `bgb_tinggi_utilitas`, `bgb_tinggi_profesional_fee`, `bgb_tinggi_biaya_perijinan`, `bgb_tinggi_keuntungan_kontraktor`, `person_was_deleted`) VALUES
(12, '1', 766096, 1537239, 194635, 365672, 476178, 1153126, 505531, 703174, 510069, 184523, 92262, 615007, 696451, 1397490, 176941, 277024, 432889, 1048296, 459574, 639249, 463699, 167748, 83874, 559161, 552556, 1191953, 141611, 151067, 225885, 530723, 229775, 342135, 216222, 107458, 53729, 358193, 285806, 551754, 120773, 280372, 131943, 347047, 178999, 160096, 184355, 67234, 33617, 224115, 919315, 1844687, 233562, 365672, 571413, 1383751, 606638, 843809, 612083, 221428, 110714, 738093, 835741, 1676988, 212329, 332429, 519467, 1257955, 551489, 767099, 556439, 201298, 100649, 670994, 663067, 1430344, 169933, 181280, 271062, 636868, 275730, 410562, 259466, 128949, 64475, 429831, 342967, 662105, 144928, 144928, 158332, 416456, 214799, 192115, 221226, 80681, 40341, 268937, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_client`
--

CREATE TABLE `mmi_client` (
  `client_id` int(5) NOT NULL,
  `client_adjustment_id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_debitur_id` int(11) NOT NULL,
  `client_person_name` varchar(50) NOT NULL,
  `client_atasan_penilai` enum('1','2') NOT NULL DEFAULT '1',
  `client_pejabat_BTN` varchar(50) NOT NULL,
  `client_jabatan_BTN` varchar(20) NOT NULL,
  `client_report` varchar(25) NOT NULL,
  `client_report_number` varchar(50) NOT NULL,
  `client_appraisal_date` date NOT NULL,
  `client_statement_date` date NOT NULL,
  `person_was_deleted` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmi_client`
--

INSERT INTO `mmi_client` (`client_id`, `client_adjustment_id`, `client_name`, `client_debitur_id`, `client_person_name`, `client_atasan_penilai`, `client_pejabat_BTN`, `client_jabatan_BTN`, `client_report`, `client_report_number`, `client_appraisal_date`, `client_statement_date`, `person_was_deleted`) VALUES
(65, 26, 'Zainudin Samsul', 53, 'Andre Taulani', '1', 'Untung Ono Prapatan', 'Head Operation Staff', 'Bank BTN Tanggerang', '538/MMIR-JKT/BTN-TGR/AMD/XI/2017', '2018-01-17', '2018-01-10', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_debitur`
--

CREATE TABLE `mmi_debitur` (
  `debitur_id` int(11) NOT NULL,
  `debitur_adjustmnet_id` int(11) NOT NULL,
  `nama_debitur` varchar(50) NOT NULL,
  `no_penugasan` varchar(20) NOT NULL,
  `tgl_penugasan` date NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `lokasi_aset` text NOT NULL,
  `alamat_aset` text NOT NULL,
  `blok_no` varchar(5) NOT NULL,
  `kelurahan` varchar(15) NOT NULL,
  `kecamatan` varchar(15) NOT NULL,
  `kota` varchar(15) NOT NULL,
  `provinsi` varchar(15) NOT NULL,
  `kode_pos` char(7) NOT NULL,
  `jenis_properti` varchar(20) NOT NULL,
  `luas_tanah` varchar(10) NOT NULL,
  `dokumen_tanah` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '1',
  `no_sertifikat` varchar(20) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `no_gs_su` varchar(20) NOT NULL,
  `tgl_gs_su` date NOT NULL,
  `tgl_berlaku` varchar(20) NOT NULL,
  `an_dokumen` varchar(50) NOT NULL,
  `hub_dng_debitur` enum('II','AA','BB','CC','DD','EE','FF','GG','HH') NOT NULL DEFAULT 'II',
  `frontage` varchar(5) NOT NULL,
  `leb_jln_depan` varchar(5) NOT NULL,
  `leb_jln_masuk` varchar(5) NOT NULL,
  `bentuk_tanah` enum('B','TB','TRZ') NOT NULL DEFAULT 'B',
  `pos_lokasi` enum('T','S','TS','K','DU') NOT NULL DEFAULT 'T',
  `kepadatan_bangunan` enum('T','S','R') NOT NULL DEFAULT 'T',
  `ehtj` varchar(5) NOT NULL,
  `ehtl` varchar(5) NOT NULL,
  `keadaan_halaman` enum('TB','BT','TT') NOT NULL DEFAULT 'TB',
  `kontur_tanah` enum('dat','beg','ber','lan') NOT NULL DEFAULT 'dat',
  `luas_bangunan` varchar(5) NOT NULL,
  `jenis_tanah` enum('TD','SWH','RW','TBM') NOT NULL DEFAULT 'TD',
  `peruntukan` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '1',
  `kondisi_lahan` enum('A','B','C','D','E') NOT NULL DEFAULT 'A',
  `kondisi_bangunan` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `thn_bangun` int(5) NOT NULL,
  `imb` varchar(20) NOT NULL,
  `luas_bangunan_imb` int(10) NOT NULL,
  `tgl_terbit_imb` date NOT NULL,
  `thn_renov` varchar(5) NOT NULL,
  `penggunaan` enum('TT','TU','TTTU','K','B') NOT NULL DEFAULT 'TT',
  `bntk_arsitek` enum('STD','CP','MDT','MIN') NOT NULL DEFAULT 'STD',
  `batas_depan` text NOT NULL,
  `batas_belakang` text NOT NULL,
  `batas_kanan` text NOT NULL,
  `batas_kiri` text NOT NULL,
  `status_obyek_sebagai` text NOT NULL,
  `peng_terbaik` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `marketability` enum('1','2','3','4','5') NOT NULL DEFAULT '1',
  `jenis_kredit` enum('1','2','3','4','5','6','7','8','9') NOT NULL DEFAULT '1',
  `debitur_photo` varchar(255) NOT NULL,
  `person_was_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmi_debitur`
--

INSERT INTO `mmi_debitur` (`debitur_id`, `debitur_adjustmnet_id`, `nama_debitur`, `no_penugasan`, `tgl_penugasan`, `tgl_pemeriksaan`, `lokasi_aset`, `alamat_aset`, `blok_no`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `jenis_properti`, `luas_tanah`, `dokumen_tanah`, `no_sertifikat`, `tgl_terbit`, `no_gs_su`, `tgl_gs_su`, `tgl_berlaku`, `an_dokumen`, `hub_dng_debitur`, `frontage`, `leb_jln_depan`, `leb_jln_masuk`, `bentuk_tanah`, `pos_lokasi`, `kepadatan_bangunan`, `ehtj`, `ehtl`, `keadaan_halaman`, `kontur_tanah`, `luas_bangunan`, `jenis_tanah`, `peruntukan`, `kondisi_lahan`, `kondisi_bangunan`, `thn_bangun`, `imb`, `luas_bangunan_imb`, `tgl_terbit_imb`, `thn_renov`, `penggunaan`, `bntk_arsitek`, `batas_depan`, `batas_belakang`, `batas_kanan`, `batas_kiri`, `status_obyek_sebagai`, `peng_terbaik`, `marketability`, `jenis_kredit`, `debitur_photo`, `person_was_deleted`) VALUES
(53, 26, 'Zainudin Samsul', '028/AMD/AMM.1/HRI.II', '2031-01-10', '2018-01-24', 'Kav. Serut Jaya', 'Jln. Serut Jaya', '3 & 4', 'Pejuang', 'Medan Satria', 'Bekasi', 'Jawa Barat', '17433', '1', '145', '1', '11581', '2007-01-02', '5/Pejuang/2017', '2006-07-01', '1970-01-01', 'Zainudin Samsul', 'II', '6', '5', '6', 'B', 'T', 'T', '0,10', '-0,10', 'TB', 'dat', '224', 'TD', '3', 'A', '1', 2016, 'Tidak Terlampir', 123124, '1970-01-01', '-', 'TT', 'STD', 'Jalan Kaveling', 'Rumah Tinggal / Hunian', 'Rumah Tinggal / Hunian', 'Rumah Tinggal / Hunian', 'X', '1', '3', '1', '20180124170522_20171123100212_20170923102315_Klein.jpg', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_person`
--

CREATE TABLE `mmi_person` (
  `person_id` int(5) NOT NULL,
  `person_adjustment_id` int(11) NOT NULL,
  `person_nik` varchar(20) DEFAULT NULL,
  `person_name` varchar(50) DEFAULT NULL,
  `person_type` enum('surveior','admin','administrator','keuangan','direktur') NOT NULL DEFAULT 'surveior',
  `person_gender` enum('L','P') NOT NULL DEFAULT 'L',
  `person_birthday` date DEFAULT NULL,
  `person_religion` enum('islam','kristen','katholik','hindu','budha') DEFAULT NULL,
  `person_address` text,
  `person_phone` char(20) DEFAULT NULL,
  `person_photo` varchar(255) DEFAULT NULL,
  `head_master` varchar(50) NOT NULL,
  `person_was_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmi_person`
--

INSERT INTO `mmi_person` (`person_id`, `person_adjustment_id`, `person_nik`, `person_name`, `person_type`, `person_gender`, `person_birthday`, `person_religion`, `person_address`, `person_phone`, `person_photo`, `head_master`, `person_was_deleted`) VALUES
(7, 26, '123', 'Trebol', 'administrator', 'L', '2017-12-05', 'islam', 'Jl. Awur', '09777777777', NULL, '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_provinsi`
--

CREATE TABLE `mmi_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi_btb_id` int(11) NOT NULL,
  `provinsi_aceh` char(5) NOT NULL,
  `provinsi_sumut` char(5) NOT NULL,
  `provinsi_sumbar` char(5) NOT NULL,
  `provinsi_riau` char(5) NOT NULL,
  `provinsi_jambi` char(5) NOT NULL,
  `provinsi_bengkulu` char(5) NOT NULL,
  `provinsi_sumsel` char(5) NOT NULL,
  `provinsi_babel` char(5) NOT NULL,
  `provinsi_kepri` char(5) NOT NULL,
  `provinsi_lampung` char(5) NOT NULL,
  `provinsi_jabar` char(5) NOT NULL,
  `provinsi_banten` char(5) NOT NULL,
  `provinsi_jateng` char(5) NOT NULL,
  `provinsi_yogyakarta` char(5) NOT NULL,
  `provinsi_jatim` char(5) NOT NULL,
  `provinsi_bali` char(5) NOT NULL,
  `provinsi_ntb` char(5) NOT NULL,
  `provinsi_ntt` char(5) NOT NULL,
  `provinsi_kaltim` char(5) NOT NULL,
  `provinsi_kalteng` char(5) NOT NULL,
  `provinsi_kalbar` char(5) NOT NULL,
  `provinsi_kalsel` char(5) NOT NULL,
  `provinsi_kaltara` char(5) NOT NULL,
  `provinsi_sulteng` char(5) NOT NULL,
  `provinsi_sulsel` char(5) NOT NULL,
  `provinsi_sulut` char(5) NOT NULL,
  `provinsi_gorontalo` char(5) NOT NULL,
  `provinsi_sultenggara` char(5) NOT NULL,
  `provinsi_sulbar` char(5) NOT NULL,
  `provinsi_maluku` char(5) NOT NULL,
  `provinsi_maluku_utara` char(5) NOT NULL,
  `provinsi_papua_barat` char(5) NOT NULL,
  `provinsi_papua` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmi_provinsi`
--

INSERT INTO `mmi_provinsi` (`id_provinsi`, `provinsi_btb_id`, `provinsi_aceh`, `provinsi_sumut`, `provinsi_sumbar`, `provinsi_riau`, `provinsi_jambi`, `provinsi_bengkulu`, `provinsi_sumsel`, `provinsi_babel`, `provinsi_kepri`, `provinsi_lampung`, `provinsi_jabar`, `provinsi_banten`, `provinsi_jateng`, `provinsi_yogyakarta`, `provinsi_jatim`, `provinsi_bali`, `provinsi_ntb`, `provinsi_ntt`, `provinsi_kaltim`, `provinsi_kalteng`, `provinsi_kalbar`, `provinsi_kalsel`, `provinsi_kaltara`, `provinsi_sulteng`, `provinsi_sulsel`, `provinsi_sulut`, `provinsi_gorontalo`, `provinsi_sultenggara`, `provinsi_sulbar`, `provinsi_maluku`, `provinsi_maluku_utara`, `provinsi_papua_barat`, `provinsi_papua`) VALUES
(1, 12, '0.87', '0.97', '0', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_provinsi_aceh`
--

CREATE TABLE `mmi_provinsi_aceh` (
  `aceh_nad` varchar(4) NOT NULL,
  `aceh_simeulue` varchar(4) NOT NULL,
  `aceh_singkil` varchar(4) NOT NULL,
  `aceh_selatan` varchar(4) NOT NULL,
  `aceh_tenggara` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mmi_provinsi_jakarta`
--

CREATE TABLE `mmi_provinsi_jakarta` (
  `id_jakarta` int(11) NOT NULL,
  `provinsi_jakarta` varchar(5) NOT NULL,
  `jakarta_selatan` varchar(5) NOT NULL,
  `jakarta_timur` varchar(5) NOT NULL,
  `jakarta_pusat` varchar(5) NOT NULL,
  `jakarta_barat` varchar(5) NOT NULL,
  `jakarta_utara` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mmi_adjustment`
--
ALTER TABLE `mmi_adjustment`
  ADD PRIMARY KEY (`adjustment_id`);

--
-- Indexes for table `mmi_banding`
--
ALTER TABLE `mmi_banding`
  ADD PRIMARY KEY (`banding_id`);

--
-- Indexes for table `mmi_btb`
--
ALTER TABLE `mmi_btb`
  ADD PRIMARY KEY (`btb_id`);

--
-- Indexes for table `mmi_client`
--
ALTER TABLE `mmi_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `mmi_debitur`
--
ALTER TABLE `mmi_debitur`
  ADD PRIMARY KEY (`debitur_id`);

--
-- Indexes for table `mmi_person`
--
ALTER TABLE `mmi_person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `mmi_provinsi`
--
ALTER TABLE `mmi_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `mmi_provinsi_jakarta`
--
ALTER TABLE `mmi_provinsi_jakarta`
  ADD PRIMARY KEY (`id_jakarta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mmi_adjustment`
--
ALTER TABLE `mmi_adjustment`
  MODIFY `adjustment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `mmi_banding`
--
ALTER TABLE `mmi_banding`
  MODIFY `banding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mmi_btb`
--
ALTER TABLE `mmi_btb`
  MODIFY `btb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mmi_client`
--
ALTER TABLE `mmi_client`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `mmi_debitur`
--
ALTER TABLE `mmi_debitur`
  MODIFY `debitur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `mmi_person`
--
ALTER TABLE `mmi_person`
  MODIFY `person_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mmi_provinsi`
--
ALTER TABLE `mmi_provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mmi_provinsi_jakarta`
--
ALTER TABLE `mmi_provinsi_jakarta`
  MODIFY `id_jakarta` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
