-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 12:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appuas`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `lulus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `nama`, `gender`, `telp`, `address`, `lulus`) VALUES
(9086, 'Rahman Ozora', 'Laki-laki', '32145676543', 'Jember', '2023'),
(11122, 'Luluk Maknun l', 'Perempuan', '32145676543', 'Sumenep', '2023'),
(11133, 'Rahman Ozora', 'Laki-laki', '082334564765', 'Sumenep', '2023'),
(11136, 'Ahmad Huday', 'Laki-laki', '32145676543', 'Sumenep', '2023'),
(11143, 'Luluk Maknun', 'Laki-laki', '32145676543', 'sonok sapudi sumenep', '2023'),
(11144, 'Rahman Ozora', 'Perempuan', '082334564765', 'sonok sapudi sumenep', '2023'),
(11176, 'Andre Pangestu', 'Laki-laki', '32145676543', 'Sumenep', '2023'),
(22222, 'Elok Rofiqa', 'Perempuan', '082334564765', 'sonok sapudi sumenep', '2023'),
(23542, 'ahmed rahman ar', 'Laki-laki', '083115786599', 'sumenep', '2018'),
(23543, 'ahmed rahman ar', 'Laki-laki', '083115786599', 'sumenep', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `gender`, `telp`, `address`, `status`) VALUES
(1112, 'Bpk. Abdul Mannan, S.pd', 'Laki-laki', '32145676543', 'Sumenep', 'PNS'),
(1123, 'Bpk. Norhaili, S.Pdi', 'Laki-laki', '32145676543', 'Banassem Sumenep', 'PNS'),
(1124, 'Bpk. Abdul Mu\'in, S.E', 'Laki-laki', '32145676543', 'Kelbhuk Sumenep', 'PNS'),
(1125, 'Bpk. Indra Safri, S.Pd', 'Laki-laki', '32145676543', 'Gayam ', 'GTT'),
(1126, 'Bpk. Wahid Sadili, S.Sos', 'Laki-laki', '32145676543', 'Pancor Gayam', 'GTY');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(50) CHARACTER SET latin1 NOT NULL,
  `telp` varchar(50) CHARACTER SET latin1 NOT NULL,
  `address` text NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `gender`, `telp`, `address`, `kelas`, `id_guru`) VALUES
(1111, 'Ahmed Arifi Hilman Rahman', 'Laki-laki', '32145676543', 'Sumenep', 'ID', 1112),
(1114, 'Ahmad Huday', 'Laki-laki', '32145676543', 'Denpasar Bali', '1B', 1124),
(1115, 'Kevin RIyas Robbani', 'Laki-laki', '32145676543', 'Jember', '1A', 1125);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `siswa_ibfk_1` (`id_guru`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
