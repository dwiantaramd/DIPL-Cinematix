-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 05:27 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinematix`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(25) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Alamat` varchar(40) NOT NULL,
  `NoTelp` varchar(40) NOT NULL,
  `TglLahir` date NOT NULL,
  `NoRekening` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `Email`, `Alamat`, `NoTelp`, `TglLahir`, `NoRekening`) VALUES
('raihanmuhith', 'raihan.muhith@gmail.', 'Jl. DEF No. 20 Bandung Jawa Barat', '1613131', '2021-06-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `idFilm` varchar(5) NOT NULL,
  `JudulFilm` varchar(50) NOT NULL,
  `Durasi` int(3) NOT NULL,
  `Sinopsis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`idFilm`, `JudulFilm`, `Durasi`, `Sinopsis`) VALUES
('FI001', 'Harry Potter and the Deathly Hallows Part 1', 153, 'abcdefghijklmn'),
('FI002', 'Harry Potter and the Deathly Hallows Part 2', 162, 'deswcaqevcaeh'),
('FI004', 'The Avengers', 122, 'seru bingitsss...'),
('FI005', 'The Avengers : Age of Ultron', 120, 'wewewewewewewewwew');

-- --------------------------------------------------------

--
-- Table structure for table `jadwaltayang`
--

CREATE TABLE `jadwaltayang` (
  `idJadwalTayang` varchar(5) NOT NULL,
  `idFilm` varchar(5) NOT NULL,
  `idTeater` varchar(5) NOT NULL,
  `idStudio` varchar(5) NOT NULL,
  `WaktuMulai` varchar(10) DEFAULT NULL,
  `WaktuSelesai` varchar(10) DEFAULT NULL,
  `TglTayang` date NOT NULL,
  `Harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwaltayang`
--

INSERT INTO `jadwaltayang` (`idJadwalTayang`, `idFilm`, `idTeater`, `idStudio`, `WaktuMulai`, `WaktuSelesai`, `TglTayang`, `Harga`) VALUES
('JD001', 'FI001', 'TE001', 'ST001', '11:00', '13:30', '2021-04-02', '25000'),
('JD002', 'FI001', 'TE001', 'ST001', '14:00', '16:30', '2021-04-02', '25000'),
('JD005', 'FI004', 'TE002', 'ST006', '7:00', '9:30', '2021-06-17', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `idKursi` int(11) NOT NULL,
  `NomorKursi` varchar(5) NOT NULL,
  `idStudio` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`idKursi`, `NomorKursi`, `idStudio`) VALUES
(1, 'A1', 'ST001'),
(2, 'A2', 'ST001'),
(3, 'A3', 'ST001'),
(4, 'A4', 'ST001'),
(5, 'A5', 'ST001'),
(6, 'A6', 'ST001'),
(7, 'A7', 'ST001'),
(8, 'A8', 'ST001'),
(9, 'A9', 'ST001'),
(10, 'A10', 'ST001'),
(11, 'A1', 'ST003');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` varchar(5) NOT NULL,
  `idPemesanan` varchar(5) NOT NULL,
  `TotalPembayaran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idPemesanan` int(5) NOT NULL,
  `idJadwalTayang` varchar(5) NOT NULL,
  `User` varchar(20) NOT NULL,
  `TglTransaksi` date NOT NULL,
  `Harga` int(10) NOT NULL,
  `Kursi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`idPemesanan`, `idJadwalTayang`, `User`, `TglTransaksi`, `Harga`, `Kursi`) VALUES
(3, 'JD001', 'raihanmuhith', '2021-06-03', 25000, 'A4'),
(4, 'JD001', 'raihanmuhith', '2021-06-03', 25000, 'A5'),
(5, 'JD005', 'raihanmuhith', '2021-06-03', 25000, 'A1');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `idStudio` varchar(5) NOT NULL,
  `NomorStudio` varchar(2) NOT NULL,
  `TipeStudio` varchar(10) NOT NULL,
  `idTeater` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`idStudio`, `NomorStudio`, `TipeStudio`, `idTeater`) VALUES
('ST001', '1', 'Reguler', 'TE001'),
('ST002', '2', 'Reguler', 'TE001'),
('ST003', '3', 'SweetBox', 'TE001'),
('ST004', '1', 'Reguler', 'TE002'),
('ST005', '2', 'SweetBox', 'TE002'),
('ST006', '3', 'Reguler', 'TE002'),
('ST007', '4', 'Reguler', 'TE001'),
('ST008', '1', 'Reguler', 'TE003'),
('ST009', '2', 'Reguler', 'TE003'),
('ST010', '3', 'Reguler', 'TE003'),
('ST011', '4', 'Reguler', 'TE003');

-- --------------------------------------------------------

--
-- Table structure for table `teater`
--

CREATE TABLE `teater` (
  `idTeater` varchar(5) NOT NULL,
  `NamaTeater` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teater`
--

INSERT INTO `teater` (`idTeater`, `NamaTeater`) VALUES
('TE001', 'XXI Transmart Buah Batu'),
('TE002', 'XXI Plaza Senayan'),
('TE003', 'XXI Trans Studio Mall'),
('TE004', 'CGV Grand Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(25) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nama` varchar(40) NOT NULL,
  `JenisAkun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Nama`, `JenisAkun`) VALUES
('admin', 'admin', 'admin', '0'),
('raihanmuhith', '12345678', 'muhammad raihan muhith', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`idFilm`);

--
-- Indexes for table `jadwaltayang`
--
ALTER TABLE `jadwaltayang`
  ADD PRIMARY KEY (`idJadwalTayang`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`idKursi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idPemesanan`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`idStudio`);

--
-- Indexes for table `teater`
--
ALTER TABLE `teater`
  ADD PRIMARY KEY (`idTeater`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `idKursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idPemesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
