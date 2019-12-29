-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2019 at 12:00 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livro`
--

-- --------------------------------------------------------

--
-- Table structure for table `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` text COLLATE utf8_bin DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `id_estado`) VALUES
(1, 'FOZ DO IGUAÇU', 1),
(2, 'CASCAVEL', 1),
(3, 'SANTO ANDRE', 2),
(4, 'SAO BERNARNDO DO CAMPO', 2);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `sigla` char(2) COLLATE utf8_bin DEFAULT NULL,
  `nome` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id`, `sigla`, `nome`) VALUES
(1, 'PR', 'PARANÁ'),
(2, 'SP', 'SAO PAULO');

-- --------------------------------------------------------

--
-- Table structure for table `famosos`
--

CREATE TABLE `famosos` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `famosos`
--

INSERT INTO `famosos` (`codigo`, `nome`) VALUES
(1, 'Érico Veríssimo'),
(2, 'John Lennon'),
(3, 'Mahatma Gandhi'),
(4, 'Ayrton Senna'),
(5, 'Charlie Chaplin'),
(6, 'Anita Garibaldi'),
(7, 'Mário Quintana'),
(8, 'Janaina Guimarães'),
(9, 'Rogerio Lins'),
(10, 'Robinson Lins'),
(11, 'Ricardo Lins'),
(12, 'Maria do Socorro'),
(13, 'Maurilio Guimaraes');

-- --------------------------------------------------------

--
-- Table structure for table `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` text COLLATE utf8_bin DEFAULT NULL,
  `endereco` text COLLATE utf8_bin DEFAULT NULL,
  `bairro` text COLLATE utf8_bin DEFAULT NULL,
  `telefone` text COLLATE utf8_bin DEFAULT NULL,
  `email` text COLLATE utf8_bin DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `endereco`, `bairro`, `telefone`, `email`, `id_cidade`) VALUES
(3, 'Aline Lins', 'Rua Tal tbm', 'Centro da Cidade de Santo Andre', '45-99933-2425', 'aline@prologic.com.br', 2),
(17, 'Luana Godoi Lins', 'Rua Rui Barbosa, 1032', 'Jardim Laranjeiras', 'Telefone do Bruno', 'luana@frt.com.br', 4),
(18, 'Angela Godoi Lins', 'Rua Tal tbm', 'Centro da Cidade de Santo Andre', 'Telefone do Bruno', 'aline@prologic.com.br', 2),
(19, 'Angela Godoi Lins 888', 'Rua Tal tbm', '', '', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
