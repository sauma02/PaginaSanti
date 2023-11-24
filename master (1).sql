-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 11:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Table structure for table `mascota`
--

CREATE TABLE `mascota` (
  `idMascota` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `raza` varchar(250) NOT NULL,
  `edad` int(11) NOT NULL,
  `peso` double NOT NULL,
  `tamaño` varchar(250) NOT NULL,
  `idVacuna` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `fechaCita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL,
  `Documento` varchar(20) DEFAULT NULL,
  `Nombres` varchar(20) DEFAULT NULL,
  `Apellidos` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `Direccion` varchar(20) DEFAULT NULL,
  `Género` varchar(10) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `idTipoDocumento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`idPersona`, `Documento`, `Nombres`, `Apellidos`, `Email`, `Telefono`, `Direccion`, `Género`, `FechaNacimiento`, `idTipoDocumento`) VALUES
(1, '1017155085', 'Daniel', 'Morales', 'vallrack67@gmail.com', '3113608314', 'Calle C', 'Masculino', '1987-09-29', 1),
(2, '23423423532', 'Santiago', 'Agudelo', 'josedavids123@live.c', '2353245345', 'calle 57 #58-43', 'Masculino', '2023-11-23', 1),
(4, '23423423532', 'Santiago', 'Agudelo', 'josedavids123@live.c', '2353245345', 'calle 57 #58-43', 'Masculino', '2023-11-08', 1),
(5, '23423423532', 'Santiago', 'Agudelo', 'josedavids123@live.c', '2353245345', 'calle 57 #58-43', 'Masculino', '2023-11-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `Descripcion` varchar(20) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRol`, `Descripcion`, `Estado`) VALUES
(1, 'Admin', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiposdocumentos`
--

CREATE TABLE `tiposdocumentos` (
  `idTipoDocumento` int(11) NOT NULL,
  `Descripcion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiposdocumentos`
--

INSERT INTO `tiposdocumentos` (`idTipoDocumento`, `Descripcion`) VALUES
(1, 'Cédula'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Clave` varchar(10) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Usuario`, `Clave`, `idPersona`, `idRol`, `Estado`) VALUES
(1, 'Vallrack', '123', 1, 1, 1),
(3, 'Santino', '123', 2, 2, 1),
(5, 'Santino123', '123', 4, 2, 1),
(6, 'Santino123', '123', 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacunas`
--

CREATE TABLE `vacunas` (
  `idVacuna` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `vacunas`
--

INSERT INTO `vacunas` (`idVacuna`, `descripcion`) VALUES
(1, 'Si'),
(2, 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idMascota`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `tiposdocumentos`
--
ALTER TABLE `tiposdocumentos`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`idVacuna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiposdocumentos`
--
ALTER TABLE `tiposdocumentos`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `idVacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
