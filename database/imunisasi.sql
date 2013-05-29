-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2012 at 11:01 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imunisasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `balita`
--

CREATE TABLE IF NOT EXISTS `balita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `id_posyandu` tinyint(2) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `balita`
--

INSERT INTO `balita` (`id`, `nama`, `tgl_lahir`, `tmp_lahir`, `jenis_kelamin`, `id_ibu`, `id_posyandu`, `aktif`) VALUES
(1, 'Seni', '2012-07-03', 'Purwakarta', 'L', 1, 1, 1),
(2, 'Dani', '2012-01-17', 'Purwakarta', 'L', 1, 2, 1),
(3, 'Desi', '2011-11-09', 'Cikampek', 'P', 1, 1, 1),
(4, 'Gardina', '2012-01-24', 'Cikampek', 'P', 1, 2, 1),
(5, 'Candra', '2012-01-23', 'Cikampek', 'L', 1, 4, 1),
(6, 'Dina', '2012-01-08', 'Cikampek', 'P', 1, 4, 1),
(7, 'Jamal', '2011-12-13', 'Purwakarta', 'P', 1, 1, 1),
(8, 'Geni', '2012-01-13', 'Cikampek', 'P', 1, 3, 1),
(9, 'Zani', '2011-12-15', 'Purwakarta', 'L', 1, 1, 1),
(10, 'Mahdi', '2012-01-06', 'Purwakarta', 'P', 1, 3, 1),
(25, 'Dara', '2012-01-19', 'Purwakarta', 'P', 1, 4, 1),
(24, 'Desi', '2012-01-06', 'Purwakarta', 'P', 1, 3, 1),
(23, 'Daliar', '2012-01-14', 'Purwakarta', 'L', 1, 2, 1),
(22, 'Diah', '2012-01-06', 'Purwakarta', 'P', 1, 2, 1),
(21, 'Rizal', '2012-01-07', 'Purwakarta', 'L', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ibu`
--

CREATE TABLE IF NOT EXISTS `ibu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `id_posyandu` tinyint(2) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ibu`
--

INSERT INTO `ibu` (`id`, `nama`, `tgl_lahir`, `tmp_lahir`, `telepon`, `alamat`, `id_posyandu`, `aktif`) VALUES
(1, 'Farida', '1975-01-11', 'Purwakarta', '089746382078', 'Jl Veteran 89', 1, 1),
(2, 'Gardina', '1989-01-10', 'Purwakarta', '', '', 1, 1),
(3, 'Siti', '1975-01-11', 'Purwakarta', '', '', 1, 1),
(4, 'Fera', '1988-04-16', 'Cikampek', '', '', 1, 1),
(5, 'Vivie', '1988-04-16', 'Subang', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE IF NOT EXISTS `imunisasi` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `waktu` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id`, `nama`, `waktu`, `keterangan`) VALUES
(1, 'Hepatitis B 0', 0, 'Vaksin hepatitis B adalah vaksin virus recombinan yang telah diinaktivasikan dan bersifat non-infecious, berasal dari HBsAG yang dihasilkan dalam sel ragi (Hansenula polymorpha) menggunakan teknologi DNA rekombinan (Vademecum Bio Farma Jan 2002)'),
(2, 'Bacillus Calmette Guerine (BCG)', 30, 'Vaksin yang dibuat untuk pemberian kekeebalan aktif terhadap tuberkulosa (TBC). Imunisasi BCG tidak menyebabkan reaksi yang bersifat umum seperti demam 1-2 minggu kemudian akan timbul indurasi dan kemerahan di tempat suntikan yang berubah menjadi pustule, kemudian pecah menjadi luka yang akan sembuh dengan sendirinya. (Vademecum , 2002)'),
(3, 'Polio 1', 30, 'Vaksin Oral Polio hidup adalah vaksin Polio Trivalent yang terdiri dari suspense virus poliomyelitis type 1,2 dan3 (strain Sabin) yang sudah dilemahkan, dibuat dalam biakan jaringan ginjal kera dan distabilkan dengan sukrosa. (Vademecum , 2002)'),
(4, 'DPT-HB 1', 60, 'Vaksin mengandung DPT berupa toxoid difteri dan toxoid tetanus yang dimurnikan dan pertusis yang inaktifasi serta vaksin hepatitis B yang merupakan sub unit vaksin virus yang mengandung HbsAG murni dan bersifat non infectious. (Vademecum , 2002)Vaksin Campak'),
(5, 'Polio 2', 60, 'Vaksin Oral Polio hidup adalah vaksin Polio Trivalent yang terdiri dari suspense virus poliomyelitis type 1,2 dan3 (strain Sabin) yang sudah dilemahkan, dibuat dalam biakan jaringan ginjal kera dan distabilkan dengan sukrosa. (Vademecum , 2002)'),
(6, 'DPT-HB 2', 90, 'Vaksin mengandung DPT berupa toxoid difteri dan toxoid tetanus yang dimurnikan dan pertusis yang inaktifasi serta vaksin hepatitis B yang merupakan sub unit vaksin virus yang mengandung HbsAG murni dan bersifat non infectious. (Vademecum , 2002)Vaksin Campak'),
(7, 'Polio 3', 90, 'Vaksin Oral Polio hidup adalah vaksin Polio Trivalent yang terdiri dari suspense virus poliomyelitis type 1,2 dan3 (strain Sabin) yang sudah dilemahkan, dibuat dalam biakan jaringan ginjal kera dan distabilkan dengan sukrosa. (Vademecum , 2002)'),
(8, 'DPT-HB 3', 120, 'Vaksin mengandung DPT berupa toxoid difteri dan toxoid tetanus yang dimurnikan dan pertusis yang inaktifasi serta vaksin hepatitis B yang merupakan sub unit vaksin virus yang mengandung HbsAG murni dan bersifat non infectious. (Vademecum , 2002)Vaksin Campak'),
(9, 'Polio 4', 120, 'Vaksin Oral Polio hidup adalah vaksin Polio Trivalent yang terdiri dari suspense virus poliomyelitis type 1,2 dan3 (strain Sabin) yang sudah dilemahkan, dibuat dalam biakan jaringan ginjal kera dan distabilkan dengan sukrosa. (Vademecum , 2002)'),
(10, 'Campak', 270, 'Vaksin Campak merupakan vaksin virus hidup yang dilemahkan. Setiap dosis (0,5 ml) mengandung tidak kurang dari 1000 infective unit virus strain CAM 70 dan tidak lebih dari 100 mcg residu kanamycin dan 30 mcg residu erythromycin (Vademecum , 2002).');

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi_balita`
--

CREATE TABLE IF NOT EXISTS `imunisasi_balita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_balita` int(11) NOT NULL,
  `id_imunisasi` tinyint(2) NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `imunisasi_balita`
--

INSERT INTO `imunisasi_balita` (`id`, `id_balita`, `id_imunisasi`, `tanggal`, `aktif`) VALUES
(10, 1, 1, '2012-07-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_posyandu` tinyint(2) NOT NULL,
  `waktu` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_posyandu`, `waktu`) VALUES
(1, 1, '2012-02-15'),
(2, 2, '2012-02-14'),
(3, 3, '2012-02-08'),
(4, 4, '2012-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_imunisasi`
--

CREATE TABLE IF NOT EXISTS `jadwal_imunisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_balita` int(11) NOT NULL,
  `id_imunisasi` int(2) NOT NULL,
  `waktu` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jadwal_imunisasi`
--

INSERT INTO `jadwal_imunisasi` (`id`, `id_balita`, `id_imunisasi`, `waktu`) VALUES
(1, 1, 1, '2012-07-03'),
(2, 1, 2, '2012-08-03'),
(3, 1, 3, '2012-08-03'),
(4, 1, 4, '2012-09-03'),
(5, 1, 5, '2012-09-03'),
(6, 1, 6, '2012-10-03'),
(7, 1, 7, '2012-10-03'),
(8, 1, 8, '2012-11-03'),
(9, 1, 9, '2012-11-03'),
(10, 1, 10, '2013-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','petugas','bidan') NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `tgl_lahir`, `tmp_lahir`, `jenis_kelamin`, `alamat`, `telepon`, `email`, `role`, `aktif`, `password`) VALUES
('admin', 'Administrator', '2011-11-11', 'Banyuwangi', 'L', 'Banyuwangi', '085721821555', 'mahen.0112@gmail.com', 'admin', 1, '477a0ab04bf237c5918a5c7fd4e048aa'),
('wati', 'Wati', '1988-04-16', 'Purwakarta', 'P', 'Sukabumi', '0264204954', 'wati@gmail.com', 'bidan', 1, 'b946cb5d9586145b6b66b444971ebe80'),
('reni', 'Reni Sulistyani', '1989-01-10', 'Cikampek', 'P', 'Jl Gandaria 34', '089746382078', 'reni@gmail.com', 'bidan', 1, '29b067ba8e81c75cb0a0d0751bfe3dc5'),
('susi', 'Susi Damayanti', '1990-01-11', 'Subang', 'P', 'Jl Garda 78', '0986753792', 'susi@gmail.com', 'bidan', 1, 'b04c9b3d6550c5ecdcb088b53a782bae');

-- --------------------------------------------------------

--
-- Table structure for table `posyandu`
--

CREATE TABLE IF NOT EXISTS `posyandu` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `tempat` text NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `posyandu`
--

INSERT INTO `posyandu` (`id`, `nama`, `tempat`, `id_petugas`) VALUES
(1, 'Mawar', 'Jl Sukasenang no 87', 'wati'),
(2, 'Melati', 'Jl Veteran 60', 'reni'),
(3, 'Dahlia', 'Jl Gandaria 78', 'susi'),
(4, 'Kenanga', 'Jl Ahmad Yani 89', 'santi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
