-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 06:21 AM
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
('FI003', 'The Incredibles II', 102, 'saxasdytghjngt'),
('FI004', 'The Avengers', 122, 'seru bingitsss...');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal tayang`
--

CREATE TABLE `jadwal tayang` (
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
-- Dumping data for table `jadwal tayang`
--

INSERT INTO `jadwal tayang` (`idJadwalTayang`, `idFilm`, `idTeater`, `idStudio`, `WaktuMulai`, `WaktuSelesai`, `TglTayang`, `Harga`) VALUES
('JD001', 'FI001', 'TE001', 'ST001', '11:00', '13:30', '2021-04-02', '25000'),
('JD002', 'FI001', 'TE001', 'ST001', '14:00', '16:30', '2021-04-02', '25000'),
('JD003', 'FI003', 'TE001', 'ST002', '11:30', '12:45', '2021-04-02', '25000'),
('JD004', 'FI003', 'TE001', 'ST003', '15:00', '16:30', '2021-04-02', '25000'),
('JD005', 'FI003', 'TE002', 'ST004', '10:45', '12:15', '2021-04-07', '30000'),
('JD006', 'FI001', 'TE002', 'ST005', '12:15', '15:30', '2021-04-07', '40000'),
('JD007', 'FI001', 'TE002', 'ST005', '16:00', '18:30', '2021-04-07', '40000'),
('JD008', 'FI003', 'TE003', 'ST006', '11:20', '12:45', '2021-04-04', '40000'),
('JD009', 'FI003', 'TE003', 'ST006', '13.00', '14:30', '2021-04-04', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `NomorKursi` varchar(5) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `idStudio` varchar(5) NOT NULL,
  `idPemesanan` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `idPemesanan` varchar(5) NOT NULL,
  `idJadwalTayang` varchar(5) NOT NULL,
  `TglTransaksi` date NOT NULL,
  `TotalHarga` int(10) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('ST003', '3', 'Reguler', 'TE001'),
('ST004', '1', 'Reguler', 'TE002'),
('ST005', '2', 'SweetBox', 'TE002'),
('ST006', '1', 'Gold', 'TE003');

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
('TE003', 'wewewe'),
('TE004', 'XXI Trans Studio Mall');

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
-- Indexes for table `jadwal tayang`
--
ALTER TABLE `jadwal tayang`
  ADD PRIMARY KEY (`idJadwalTayang`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`NomorKursi`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
