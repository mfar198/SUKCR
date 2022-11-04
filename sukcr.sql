-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 04:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sukcr`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

CREATE TABLE `acc` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `unitbahagian` varchar(255) NOT NULL,
  `jawatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`id`, `username`, `password`, `email`, `name`, `tel`, `unitbahagian`, `jawatan`, `status`) VALUES
(1, 'superadmin', 'e99a18c428cb38d5f260853678922e03', 'superadmin@admin.com', 'SUPERADMIN', 195112690, 'ADMIN', 'SUPERADMIN', 'superadmin'),
(2, 'admin', 'e99a18c428cb38d5f260853678922e03', 'admin@admin.com', 'Admin', 195112690, 'ADMIN', 'Admin', 'admin'),
(27, 'firdaus', 'e99a18c428cb38d5f260853678922e03', 'firdaus@bpm.com', 'Muhammad Firdaus', 195112690, 'Bahagian Pengurusan Maklumat', 'Praktikal', 'user'),
(28, 'aiman', '24775f4c046499d6494654258352495a', 'aiman@bpm.com', 'Aiman Afiq', 11562690, 'Bahagian Pengurusan Maklumat', 'Praktikal', 'user'),
(29, 'iffah', '84e2d2e4fef2cc903bc25519e60e921a', 'iffah@bpm.com', 'Faridatul Iffah', 185656930, 'Bahagian Dewan Negeri dan MMK', 'Praktikal', 'user'),
(30, 'gabey', '6dec889b6270ebadef4422be2e0dad4b', 'gabey@suk.com', 'Gabey', 136565980, 'Bahagian Pengurusan Sumber Manusia', 'Praktikal', 'user'),
(31, 'fatin', 'ba7091270341b74b9c2171402a560a0c', 'fatin@suk.com', 'Fatin', 145869898, 'Bahagian Korporat', 'Praktikal', 'user'),
(32, 'Faiz', '9d4d4ab0dfdb72a54b895d78b90b09c7', 'faiz@pbu.my', 'Muhammad Faiz', 194426980, 'Unit Perancang Ekonomi Negeri', 'Praktikal', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `username` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `jawatan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unitbahagian` varchar(255) NOT NULL,
  `jenkenderaan` varchar(255) NOT NULL,
  `tarikh` date NOT NULL,
  `masa` time NOT NULL,
  `butir` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`username`, `id`, `name`, `tel`, `jawatan`, `email`, `unitbahagian`, `jenkenderaan`, `tarikh`, `masa`, `butir`, `status`) VALUES
('firdaus', 23, 'Muhammad Firdaus', 195112690, 'Praktikal', 'firdaus@bpm.com', 'Bahagian Pengurusan Maklumat', 'Kereta', '2018-11-05', '08:00:00', 'Lawatan sambil belajar ke SUK Kedah', 'Approved'),
('aiman', 24, 'Aiman Afiq', 11562690, 'Praktikal', 'aiman@bpm.com', 'Bahagian Pengurusan Maklumat', 'Pacuan 4 Roda', '2018-12-08', '08:00:00', 'Lawatan ke Muzium Negara', 'Approved'),
('iffah', 25, 'Faridatul Iffah', 185656930, 'Praktikal', 'iffah@bpm.com', 'Bahagian Dewan Negeri dan MMK', 'Trasit', '2018-12-09', '08:00:00', 'Pertandingan bola tampar peringkat negeri', 'Pending'),
('gabey', 26, 'Gabey', 136565980, 'Praktikal', 'gabey@suk.com', 'Bahagian Pengurusan Sumber Manusia', 'Lori', '2018-11-15', '15:00:00', 'Mengangkut barang-barang pertanding ke stadium', 'Rejected'),
('fatin', 27, 'Fatin', 145869898, 'Praktikal', 'fatin@suk.com', 'Bahagian Korporat', 'Bas', '2018-12-27', '09:00:00', 'Lawatan rasmi ke Putrajaya', 'Approved'),
('fatin', 28, 'Fatin', 145869898, 'Praktikal', 'fatin@suk.com', 'Bahagian Korporat', 'Bas', '2018-12-22', '07:59:00', 'Pertandingan bola tampar', 'Rejected'),
('fatin', 29, 'Fatin', 145869898, 'Praktikal', 'fatin@suk.com', 'Bahagian Korporat', 'Kereta', '2018-12-09', '10:00:00', 'Lawatan rasmi ke Kuala Lumpur', 'Approved'),
('firdaus', 30, 'Muhammad Firdaus', 195112690, 'Praktikal', 'firdaus@bpm.com', 'Bahagian Pengurusan Maklumat', 'Pacuan 4 Roda', '2019-02-01', '08:00:00', 'Mesyuarat rasmi di Putrajaya', 'Pending'),
('aiman', 31, 'Aiman Afiq', 11562690, 'Praktikal', 'aiman@bpm.com', 'Bahagian Pengurusan Maklumat', 'Bas', '2019-02-07', '12:00:00', 'Kunjungan ke Muzium Negara', 'Rejected'),
('aiman', 32, 'Aiman Afiq', 11562690, 'Praktikal', 'aiman@bpm.com', 'Bahagian Pengurusan Maklumat', 'Lori', '1998-08-09', '21:54:00', 'lalala', 'Pending'),
('gabey', 33, 'Gabey', 136565980, 'Praktikal', 'gabey@suk.com', 'Bahagian Pengurusan Sumber Manusia', 'Kereta', '2019-02-17', '08:00:00', 'Lawatan ke Muzium Perak', 'Approved'),
('gabey', 34, 'Gabey', 136565980, 'Praktikal', 'gabey@suk.com', 'Bahagian Pengurusan Sumber Manusia', 'Lori', '2019-05-17', '09:00:00', 'Mengangkut barang ke Menara SSI', 'Rejected'),
('fatin', 35, 'Fatin', 145869898, 'Praktikal', 'fatin@suk.com', 'Bahagian Korporat', 'Trasit', '2019-02-09', '08:00:00', 'Rombongan rasmi ke Putrajaya', 'Approved'),
('iffah', 36, 'Faridatul Iffah', 185656930, 'Praktikal', 'iffah@bpm.com', 'Bahagian Dewan Negeri dan MMK', 'Pacuan 4 Roda', '2018-12-07', '08:00:00', 'Pertandingan catur peringkat daerah', 'Pending'),
('iffah', 37, 'Faridatul Iffah', 185656930, 'Praktikal', 'iffah@bpm.com', 'Bahagian Dewan Negeri dan MMK', 'Bas', '2019-02-16', '08:00:00', 'Lawatan ke Petrosains Kuala Lumpur', 'Rejected'),
('Faiz', 38, 'Muhammad Faiz', 194426980, 'Praktikal', 'faiz@pbu.my', 'Unit Perancang Ekonomi Negeri', 'Trasit', '2018-11-30', '21:00:00', 'Urusan rasmi ke Kuala Lumpur', 'Rejected'),
('firdaus', 39, 'Muhammad Firdaus', 195112690, 'Praktikal', 'firdaus@bpm.com', 'Bahagian Pengurusan Maklumat', 'Pacuan 4 Roda', '2018-11-02', '21:00:00', 'Contoh', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc`
--
ALTER TABLE `acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
