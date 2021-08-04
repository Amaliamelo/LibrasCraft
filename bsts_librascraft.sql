-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 08:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsts_librascraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `adiministrador`
--

CREATE TABLE `adiministrador` (
  `id_adm` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adiministrador`
--

INSERT INTO `adiministrador` (`id_adm`, `nome`, `email`, `senha`) VALUES
(1, 'Libras', 'librascraft@gmail.com', 'bfbba2b2b8f05f84bd1a1e2e5d632846'),
(2, 'as', 'a@gmail.com', 'bfbba2b2b8f05f84bd1a1e2e5d632846');

-- --------------------------------------------------------

--
-- Table structure for table `fase`
--

CREATE TABLE `fase` (
  `id_fase` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fase`
--

INSERT INTO `fase` (`id_fase`, `nome`) VALUES
(1, 'CASA'),
(2, 'ESCOLA'),
(3, 'RESTAURANTE'),
(4, 'ABC 123'),
(6, 'ONIBUS');

-- --------------------------------------------------------

--
-- Table structure for table `frase`
--

CREATE TABLE `frase` (
  `id_frase` int(11) NOT NULL,
  `frase` varchar(100) NOT NULL,
  `video_frase` varchar(100) NOT NULL,
  `cod_subfase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frase`
--

INSERT INTO `frase` (`id_frase`, `frase`, `video_frase`, `cod_subfase`) VALUES
(15, 'Eu peguei a faca', 'Eu peguei a faca', 2),
(17, 'Eu fechei o Armario', 'xxxxxxxxxxxxxxxxxxxxxx', 2),
(18, 'Pegue a almofada', 'xxxxxxxxxxxxxxxxxxxxxx', 1),
(20, 'Nós jogamos Video-Game', 'xxxxxxxxxxxxxxxxxxxxxx', 1),
(21, 'Qual será o jantar?', 'xxxxxxxxxxxxxxxxxxxxxx', 2),
(23, 'Abra a Cortina', 'xxxxxxxxxxxxxxxxxxxxxx', 1),
(24, 'Feche a porta', 'xxxxxxxxxxxxxxxxxxxxxx', 1),
(27, 'Abra a porta', 'xxxxxxxxxxxxxxxxxxxxxx', 1),
(28, 'Desligue a televisão', 'xxxxxxxxxxxxxxxxxxxxxx', 1),
(31, 'Eu fechei a geladeira', 'zzzzzzzzzzzz', 2);

-- --------------------------------------------------------

--
-- Table structure for table `frase_palavra`
--

CREATE TABLE `frase_palavra` (
  `id_frase_palavra` int(11) NOT NULL,
  `cod_palavra` int(11) NOT NULL,
  `cod_frase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frase_palavra`
--

INSERT INTO `frase_palavra` (`id_frase_palavra`, `cod_palavra`, `cod_frase`) VALUES
(24, 8, 17),
(68, 16, 20),
(27, 22, 18),
(36, 23, 23),
(38, 25, 24),
(41, 25, 27),
(43, 28, 28),
(65, 41, 15),
(78, 43, 31),
(33, 44, 21),
(63, 117, 15),
(22, 117, 17),
(76, 117, 31),
(42, 119, 28),
(35, 120, 23),
(40, 120, 27),
(23, 121, 17),
(39, 121, 24),
(77, 121, 31),
(64, 133, 15),
(26, 133, 18),
(32, 137, 21),
(66, 141, 20),
(67, 142, 20);

-- --------------------------------------------------------

--
-- Table structure for table `palavra`
--

CREATE TABLE `palavra` (
  `id_palavra` int(11) NOT NULL,
  `palavra` varchar(100) NOT NULL,
  `video_sinal` varchar(500) NOT NULL,
  `cod_subfase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `palavra`
--

INSERT INTO `palavra` (`id_palavra`, `palavra`, `video_sinal`, `cod_subfase`) VALUES
(8, 'ARMARIO', 'L4mUUEhJneA', 2),
(9, 'PANELA', 'BrAi2HalIK4', 2),
(10, 'CAMA', '8y3ZJb2ZUgg', 4),
(11, 'GARFO', '8XfVuZP2Tzw', 2),
(12, 'CHUVEIRO', 'GWZIpgfHg0A', 3),
(15, 'JANELA', 'L_fAKrbAHCI', 1),
(16, 'VÍDEO GAME', 'osEMS0sY0sY', 1),
(18, 'SOFÁ', 'HfLiUGqSmAw', 1),
(20, 'DVD', 'DUobx9a1tCU', 1),
(22, 'ALMOFADA', 'kVLgsSPq1rs', 1),
(23, 'CORTINA', 'h_CXY9VQ_5g', 1),
(24, 'ESTANTE', 'bxFlyaI7YcE', 1),
(25, 'PORTA', 'U2hvpVWnRjk', 1),
(26, 'RACK', 'eN_AKLCOx34', 1),
(27, 'TAPETE', '82zb_Lzncr8', 1),
(28, 'TELEVISÃO', 'RNHHME7VMLg', 1),
(37, 'ALMOÇAR', 'CjEjTSfOoMc', 2),
(38, 'CADEIRA', 'TNX_WmS9aR4', 2),
(39, 'COLHER', 'BdwGb6OgomU', 2),
(40, 'COMER', 'Lxl64WR1Plk', 2),
(41, 'FACA', 'ppeuCc5mo84', 2),
(42, 'FOGÃO', 'y1zLSsJnyQM', 2),
(43, 'GELADEIRA', 'FH_6bdAwcwk', 2),
(44, 'JANTAR', 'j0eUJ2Qq_Qo', 2),
(45, 'MESA', 'KgAwf8UcAos', 2),
(46, 'MICROONDAS', '9eXvRMp9QmM', 2),
(47, 'BUCHA', 'Fr9MWiV77Ng', 3),
(48, 'BOX', 'sgPdszL0PqM', 3),
(49, 'CESTO DE ROUPAS', 'AIDpnkAoLb8', 3),
(50, 'ESCOVA DE DENTE', 'yYGtX8jzb-8', 3),
(51, 'ESPELHO', 'haA0eTnXKLo', 3),
(52, 'FIO DENTAL', 'LpkSAkePXJ8', 3),
(53, 'PENTE', 'ksKWDQOxfJM', 3),
(54, 'PAPEL HIGIÊNICO', 'GZFVEemRJYY', 3),
(55, 'VASO SANITÁRIO', 'rqCWKCZLfug', 3),
(56, 'SABONETE', 'ym1nlbacazM', 3),
(57, 'PASTA DE DENTE', 'ktBug89nHP0', 3),
(58, 'SHAMPOO', 'm7k8STHxAjs', 3),
(59, 'TOALHA DE BANHO', 'FRWLwZMjfKk', 3),
(60, 'TORNEIRA', 'RUqteBvWoBE', 3),
(63, 'COBERTOR', 'u6SI1i3wYjY', 4),
(64, 'COMPUTADOR', 'CeIfw9OlrUw', 4),
(65, 'DORMIR', '5HkvCb4WF7k', 4),
(66, 'ESCRIVANINHA', 'GF3eHTop09Y', 4),
(67, 'GUARDA-ROUPA', 'VpRMsyQTlQI', 4),
(68, 'MAQUIAGEM', '87Nygnk1T3A', 4),
(69, 'NOTEBOOK', '9FOLwDzaBB4', 4),
(70, 'PERFUME', 'mX5SYF5GKj8', 4),
(71, 'PIJAMA', '59xsFghVwio', 4),
(72, 'ROUPA', 'JFfL-eybauc', 4),
(73, 'SAPATO', 'sdAwzROl1wY', 4),
(74, 'TRAVESSEIRO', 'RlmiezXw2JM', 4),
(75, 'A', 'alfabeto/A.gif', 8),
(76, 'B', 'alfabeto/B.gif', 8),
(77, 'C', 'alfabeto/C.gif', 8),
(78, 'D', 'alfabeto/D.gif', 8),
(79, 'E', 'alfabeto/E.gif', 8),
(80, 'F', 'alfabeto/F.gif', 8),
(81, 'G', 'alfabeto/G.gif', 8),
(82, 'H', 'alfabeto/H.gif', 8),
(83, 'I', 'alfabeto/I.gif', 8),
(84, 'J', 'alfabeto/J.gif', 8),
(85, 'K', 'alfabeto/K.gif', 8),
(86, 'L', 'alfabeto/L.gif', 8),
(87, 'M', 'alfabeto/M.gif', 8),
(88, 'N', 'alfabeto/N.gif', 8),
(89, 'O', 'alfabeto/O.gif', 8),
(90, 'P', 'alfabeto/P.gif', 8),
(91, 'Q', 'alfabeto/Q.gif', 8),
(92, 'R', 'alfabeto/R.gif', 8),
(93, 'S', 'alfabeto/S.gif', 8),
(94, 'T', 'alfabeto/T.gif', 8),
(95, 'U', 'alfabeto/U.gif', 8),
(96, 'V', 'alfabeto/V.gif', 8),
(97, 'W', 'alfabeto/W.gif', 8),
(98, 'X', 'alfabeto/X.gif', 8),
(99, 'Y', 'alfabeto/Y.gif', 8),
(100, 'Z', 'alfabeto/Z.gif', 8),
(101, '23', 'numeral/0.gif', 7),
(102, '67', 'numeral/1.gif', 7),
(103, '2', 'numeral/2.gif', 7),
(104, '3', 'numeral/3.gif', 7),
(105, '4', 'numeral/4.gif', 7),
(106, '5', 'numeral/5.gif', 7),
(107, '6', 'numeral/6.gif', 7),
(108, '7', 'numeral/7.gif', 7),
(109, '8', 'numeral/8.gif', 7),
(110, '9', 'numeral/9.gif', 7),
(115, 'TESTE', 'xxxxxxxxxx', 7),
(117, 'EU', 'eu', 9),
(118, 'LIGAR', 'ligar', 10),
(119, 'DESLIGAR', 'desligar', 10),
(120, 'ABRIR', 'abrir', 10),
(121, 'FECHAR', 'fechar', 10),
(123, 'TU', 'tu', 9),
(133, 'PEGAR', 'pegar', 10),
(134, 'QUERER', 'querer', 10),
(135, 'COLOCAR', 'colocar', 10),
(137, 'SER', 'ser', 10),
(139, 'ESTAR', 'estar', 10),
(140, 'ELE', 'ele', 9),
(141, 'NÓS', 'nós', 9),
(142, 'JOGAR', 'jogar', 10),
(143, 'VOCÊ', 'voce', 9);

-- --------------------------------------------------------

--
-- Table structure for table `resposta`
--

CREATE TABLE `resposta` (
  `id_resposta` int(11) DEFAULT NULL,
  `resposta` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_subfase` int(11) NOT NULL,
  `cod_palavra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resposta`
--

INSERT INTO `resposta` (`id_resposta`, `resposta`, `cod_usuario`, `cod_subfase`, `cod_palavra`) VALUES
(NULL, 8, 54, 2, 8),
(NULL, 8, 70, 2, 8),
(NULL, 8, 71, 2, 8),
(NULL, 8, 79, 2, 8),
(NULL, 8, 81, 2, 8),
(NULL, 8, 94, 2, 8),
(NULL, 8, 125, 2, 8),
(NULL, 8, 147, 2, 8),
(NULL, 9, 54, 2, 9),
(NULL, 9, 70, 2, 9),
(NULL, 9, 79, 2, 9),
(NULL, 9, 81, 2, 9),
(NULL, 9, 94, 2, 9),
(NULL, 9, 125, 2, 9),
(NULL, 9, 125, 2, 41),
(NULL, 9, 147, 2, 9),
(NULL, 10, 57, 4, 10),
(NULL, 10, 70, 4, 10),
(NULL, 10, 75, 4, 10),
(NULL, 10, 79, 4, 10),
(NULL, 10, 81, 4, 10),
(NULL, 10, 96, 4, 10),
(NULL, 10, 150, 4, 10),
(NULL, 11, 54, 2, 11),
(NULL, 11, 70, 2, 11),
(NULL, 11, 79, 2, 11),
(NULL, 11, 81, 2, 11),
(NULL, 11, 94, 2, 11),
(NULL, 12, 54, 3, 12),
(NULL, 12, 70, 3, 12),
(NULL, 12, 79, 3, 12),
(NULL, 12, 81, 3, 12),
(NULL, 12, 94, 3, 12),
(NULL, 12, 147, 3, 12),
(NULL, 15, 54, 1, 15),
(NULL, 15, 69, 1, 15),
(NULL, 15, 70, 1, 15),
(NULL, 15, 79, 1, 15),
(NULL, 15, 81, 1, 15),
(NULL, 15, 82, 1, 15),
(NULL, 15, 94, 1, 15),
(NULL, 15, 101, 1, 15),
(NULL, 15, 103, 1, 15),
(NULL, 15, 147, 1, 15),
(NULL, 15, 150, 1, 15),
(NULL, 16, 54, 1, 16),
(NULL, 16, 69, 1, 16),
(NULL, 16, 70, 1, 16),
(NULL, 16, 74, 1, 16),
(NULL, 16, 79, 1, 16),
(NULL, 16, 81, 1, 16),
(NULL, 16, 82, 1, 16),
(NULL, 16, 85, 1, 28),
(NULL, 16, 94, 1, 16),
(NULL, 16, 101, 1, 16),
(NULL, 16, 103, 1, 24),
(NULL, 16, 147, 1, 16),
(NULL, 16, 150, 1, 16),
(NULL, 18, 39, 1, 25),
(NULL, 18, 40, 1, 18),
(NULL, 18, 41, 1, 18),
(NULL, 18, 54, 1, 18),
(NULL, 18, 54, 4, 10),
(NULL, 18, 69, 1, 18),
(NULL, 18, 70, 1, 18),
(NULL, 18, 79, 1, 18),
(NULL, 18, 81, 1, 18),
(NULL, 18, 82, 1, 18),
(NULL, 18, 94, 1, 18),
(NULL, 18, 97, 1, 18),
(NULL, 18, 101, 1, 18),
(NULL, 18, 103, 1, 27),
(NULL, 18, 147, 1, 18),
(NULL, 18, 150, 1, 18),
(NULL, 20, 41, 1, 20),
(NULL, 20, 54, 1, 20),
(NULL, 20, 69, 1, 20),
(NULL, 20, 70, 1, 20),
(NULL, 20, 74, 1, 20),
(NULL, 20, 79, 1, 20),
(NULL, 20, 81, 1, 20),
(NULL, 20, 82, 1, 20),
(NULL, 20, 94, 1, 20),
(NULL, 20, 101, 1, 20),
(NULL, 20, 103, 1, 20),
(NULL, 20, 143, 1, 20),
(NULL, 20, 147, 1, 20),
(NULL, 20, 150, 1, 20),
(NULL, 22, 54, 1, 22),
(NULL, 22, 69, 1, 22),
(NULL, 22, 70, 1, 22),
(NULL, 22, 79, 1, 22),
(NULL, 22, 81, 1, 22),
(NULL, 22, 82, 1, 22),
(NULL, 22, 94, 1, 22),
(NULL, 22, 101, 1, 22),
(NULL, 22, 103, 1, 22),
(NULL, 22, 147, 1, 22),
(NULL, 22, 150, 1, 22),
(NULL, 23, 54, 1, 23),
(NULL, 23, 69, 1, 23),
(NULL, 23, 70, 1, 23),
(NULL, 23, 72, 1, 20),
(NULL, 23, 79, 1, 23),
(NULL, 23, 81, 1, 23),
(NULL, 23, 82, 1, 23),
(NULL, 23, 94, 1, 23),
(NULL, 23, 101, 1, 23),
(NULL, 23, 103, 1, 23),
(NULL, 23, 143, 1, 27),
(NULL, 23, 147, 1, 23),
(NULL, 23, 150, 1, 23),
(NULL, 24, 54, 1, 24),
(NULL, 24, 69, 1, 24),
(NULL, 24, 70, 1, 24),
(NULL, 24, 79, 1, 24),
(NULL, 24, 79, 1, 26),
(NULL, 24, 81, 1, 24),
(NULL, 24, 82, 1, 24),
(NULL, 24, 94, 1, 24),
(NULL, 24, 101, 1, 24),
(NULL, 24, 103, 1, 28),
(NULL, 24, 147, 1, 24),
(NULL, 24, 150, 1, 24),
(NULL, 25, 54, 1, 25),
(NULL, 25, 69, 1, 25),
(NULL, 25, 70, 1, 25),
(NULL, 25, 79, 1, 25),
(NULL, 25, 81, 1, 25),
(NULL, 25, 82, 1, 25),
(NULL, 25, 85, 1, 25),
(NULL, 25, 94, 1, 25),
(NULL, 25, 101, 1, 25),
(NULL, 25, 147, 1, 25),
(NULL, 25, 150, 1, 25),
(NULL, 26, 69, 1, 26),
(NULL, 26, 70, 1, 26),
(NULL, 26, 74, 1, 15),
(NULL, 26, 81, 1, 26),
(NULL, 26, 82, 1, 26),
(NULL, 26, 94, 1, 26),
(NULL, 26, 101, 1, 26),
(NULL, 26, 125, 1, 16),
(NULL, 26, 147, 1, 26),
(NULL, 26, 150, 1, 26),
(NULL, 27, 54, 1, 27),
(NULL, 27, 69, 1, 27),
(NULL, 27, 70, 1, 27),
(NULL, 27, 74, 1, 27),
(NULL, 27, 79, 1, 27),
(NULL, 27, 81, 1, 27),
(NULL, 27, 82, 1, 27),
(NULL, 27, 94, 1, 27),
(NULL, 27, 101, 1, 27),
(NULL, 27, 103, 1, 25),
(NULL, 27, 147, 1, 27),
(NULL, 27, 150, 1, 27),
(NULL, 28, 54, 1, 26),
(NULL, 28, 54, 1, 28),
(NULL, 28, 69, 1, 28),
(NULL, 28, 70, 1, 28),
(NULL, 28, 79, 1, 28),
(NULL, 28, 81, 1, 28),
(NULL, 28, 82, 1, 28),
(NULL, 28, 94, 1, 28),
(NULL, 28, 101, 1, 28),
(NULL, 28, 103, 1, 18),
(NULL, 28, 147, 1, 28),
(NULL, 28, 150, 1, 28),
(NULL, 37, 54, 2, 37),
(NULL, 37, 70, 2, 37),
(NULL, 37, 79, 2, 37),
(NULL, 37, 81, 2, 37),
(NULL, 37, 94, 2, 37),
(NULL, 37, 125, 2, 37),
(NULL, 37, 125, 2, 43),
(NULL, 37, 147, 2, 37),
(NULL, 38, 54, 2, 38),
(NULL, 38, 70, 2, 38),
(NULL, 38, 79, 2, 38),
(NULL, 38, 81, 2, 38),
(NULL, 38, 86, 2, 38),
(NULL, 38, 94, 2, 38),
(NULL, 38, 125, 2, 38),
(NULL, 38, 147, 2, 38),
(NULL, 39, 54, 2, 39),
(NULL, 39, 70, 2, 39),
(NULL, 39, 79, 2, 39),
(NULL, 39, 81, 2, 39),
(NULL, 39, 94, 2, 39),
(NULL, 39, 125, 2, 39),
(NULL, 39, 147, 2, 11),
(NULL, 39, 147, 2, 39),
(NULL, 40, 37, 2, 39),
(NULL, 40, 54, 2, 40),
(NULL, 40, 70, 2, 40),
(NULL, 40, 71, 2, 40),
(NULL, 40, 79, 2, 40),
(NULL, 40, 81, 2, 40),
(NULL, 40, 94, 2, 40),
(NULL, 40, 125, 2, 40),
(NULL, 40, 147, 2, 40),
(NULL, 41, 54, 2, 41),
(NULL, 41, 70, 2, 41),
(NULL, 41, 79, 2, 41),
(NULL, 41, 81, 2, 41),
(NULL, 41, 94, 2, 41),
(NULL, 41, 147, 2, 41),
(NULL, 42, 54, 2, 42),
(NULL, 42, 70, 2, 42),
(NULL, 42, 71, 2, 42),
(NULL, 42, 79, 2, 42),
(NULL, 42, 81, 2, 42),
(NULL, 42, 94, 2, 42),
(NULL, 42, 125, 2, 42),
(NULL, 42, 147, 2, 42),
(NULL, 43, 54, 2, 43),
(NULL, 43, 70, 2, 43),
(NULL, 43, 79, 2, 43),
(NULL, 43, 81, 2, 43),
(NULL, 43, 94, 2, 43),
(NULL, 43, 147, 2, 43),
(NULL, 44, 54, 2, 44),
(NULL, 44, 70, 2, 44),
(NULL, 44, 79, 2, 44),
(NULL, 44, 81, 2, 44),
(NULL, 44, 94, 2, 44),
(NULL, 44, 125, 2, 44),
(NULL, 44, 147, 2, 44),
(NULL, 45, 54, 2, 45),
(NULL, 45, 70, 2, 45),
(NULL, 45, 71, 2, 45),
(NULL, 45, 79, 2, 45),
(NULL, 45, 81, 2, 45),
(NULL, 45, 86, 2, 45),
(NULL, 45, 94, 2, 45),
(NULL, 45, 125, 2, 11),
(NULL, 45, 125, 2, 45),
(NULL, 45, 125, 2, 46),
(NULL, 45, 147, 2, 45),
(NULL, 46, 54, 2, 46),
(NULL, 46, 70, 2, 46),
(NULL, 46, 71, 2, 46),
(NULL, 46, 79, 2, 46),
(NULL, 46, 81, 2, 46),
(NULL, 46, 94, 2, 46),
(NULL, 46, 147, 2, 46),
(NULL, 47, 53, 3, 12),
(NULL, 47, 53, 3, 47),
(NULL, 47, 54, 3, 47),
(NULL, 47, 70, 3, 47),
(NULL, 47, 74, 3, 59),
(NULL, 47, 79, 3, 47),
(NULL, 47, 81, 3, 47),
(NULL, 47, 94, 3, 47),
(NULL, 47, 147, 3, 47),
(NULL, 48, 53, 3, 48),
(NULL, 48, 54, 3, 48),
(NULL, 48, 70, 3, 48),
(NULL, 48, 79, 3, 48),
(NULL, 48, 81, 3, 48),
(NULL, 48, 94, 3, 48),
(NULL, 48, 147, 3, 48),
(NULL, 49, 53, 3, 49),
(NULL, 49, 54, 3, 49),
(NULL, 49, 70, 3, 49),
(NULL, 49, 79, 3, 49),
(NULL, 49, 81, 3, 49),
(NULL, 49, 94, 3, 49),
(NULL, 49, 147, 3, 49),
(NULL, 50, 53, 3, 50),
(NULL, 50, 54, 3, 50),
(NULL, 50, 70, 3, 50),
(NULL, 50, 79, 3, 50),
(NULL, 50, 81, 3, 50),
(NULL, 50, 94, 3, 50),
(NULL, 50, 147, 3, 50),
(NULL, 51, 53, 3, 51),
(NULL, 51, 54, 3, 51),
(NULL, 51, 70, 3, 51),
(NULL, 51, 79, 3, 51),
(NULL, 51, 81, 3, 51),
(NULL, 51, 94, 3, 51),
(NULL, 51, 147, 3, 51),
(NULL, 52, 53, 3, 52),
(NULL, 52, 54, 3, 52),
(NULL, 52, 70, 3, 52),
(NULL, 52, 79, 3, 52),
(NULL, 52, 81, 3, 52),
(NULL, 52, 94, 3, 52),
(NULL, 52, 147, 3, 52),
(NULL, 53, 53, 3, 53),
(NULL, 53, 54, 3, 53),
(NULL, 53, 70, 3, 53),
(NULL, 53, 79, 3, 53),
(NULL, 53, 81, 3, 53),
(NULL, 53, 94, 3, 53),
(NULL, 53, 147, 3, 53),
(NULL, 54, 53, 3, 54),
(NULL, 54, 54, 3, 54),
(NULL, 54, 70, 3, 54),
(NULL, 54, 79, 3, 54),
(NULL, 54, 81, 3, 54),
(NULL, 54, 94, 3, 54),
(NULL, 54, 147, 3, 54),
(NULL, 55, 53, 3, 55),
(NULL, 55, 54, 3, 55),
(NULL, 55, 70, 3, 55),
(NULL, 55, 74, 3, 55),
(NULL, 55, 79, 3, 55),
(NULL, 55, 81, 3, 55),
(NULL, 55, 94, 3, 55),
(NULL, 55, 147, 3, 55),
(NULL, 56, 53, 3, 56),
(NULL, 56, 54, 3, 56),
(NULL, 56, 70, 3, 56),
(NULL, 56, 74, 3, 56),
(NULL, 56, 79, 3, 56),
(NULL, 56, 81, 3, 56),
(NULL, 56, 94, 3, 56),
(NULL, 56, 147, 3, 56),
(NULL, 57, 53, 3, 57),
(NULL, 57, 54, 3, 57),
(NULL, 57, 70, 3, 57),
(NULL, 57, 79, 3, 57),
(NULL, 57, 81, 3, 57),
(NULL, 57, 94, 3, 57),
(NULL, 57, 147, 3, 57),
(NULL, 58, 53, 3, 58),
(NULL, 58, 54, 3, 58),
(NULL, 58, 70, 3, 58),
(NULL, 58, 74, 3, 58),
(NULL, 58, 79, 3, 58),
(NULL, 58, 81, 3, 58),
(NULL, 58, 94, 3, 58),
(NULL, 58, 147, 3, 58),
(NULL, 59, 53, 3, 59),
(NULL, 59, 54, 3, 59),
(NULL, 59, 70, 3, 59),
(NULL, 59, 79, 3, 59),
(NULL, 59, 81, 3, 59),
(NULL, 59, 94, 3, 59),
(NULL, 59, 147, 3, 59),
(NULL, 60, 53, 3, 60),
(NULL, 60, 54, 3, 60),
(NULL, 60, 70, 3, 60),
(NULL, 60, 79, 3, 60),
(NULL, 60, 81, 3, 60),
(NULL, 60, 94, 3, 60),
(NULL, 60, 147, 3, 60),
(NULL, 63, 54, 4, 63),
(NULL, 63, 57, 4, 63),
(NULL, 63, 70, 4, 63),
(NULL, 63, 79, 4, 63),
(NULL, 63, 81, 4, 63),
(NULL, 63, 86, 4, 63),
(NULL, 63, 96, 4, 63),
(NULL, 63, 115, 4, 70),
(NULL, 63, 150, 4, 63),
(NULL, 64, 57, 4, 64),
(NULL, 64, 70, 4, 64),
(NULL, 64, 79, 4, 64),
(NULL, 64, 81, 4, 64),
(NULL, 64, 96, 4, 64),
(NULL, 64, 150, 4, 64),
(NULL, 65, 54, 4, 65),
(NULL, 65, 57, 4, 65),
(NULL, 65, 70, 4, 65),
(NULL, 65, 75, 4, 63),
(NULL, 65, 75, 4, 65),
(NULL, 65, 75, 4, 73),
(NULL, 65, 79, 4, 65),
(NULL, 65, 81, 4, 65),
(NULL, 65, 96, 4, 65),
(NULL, 65, 150, 4, 65),
(NULL, 66, 54, 4, 66),
(NULL, 66, 57, 4, 66),
(NULL, 66, 70, 4, 66),
(NULL, 66, 75, 4, 66),
(NULL, 66, 79, 4, 66),
(NULL, 66, 81, 4, 66),
(NULL, 66, 96, 4, 66),
(NULL, 66, 150, 4, 66),
(NULL, 67, 54, 4, 67),
(NULL, 67, 57, 4, 67),
(NULL, 67, 70, 4, 67),
(NULL, 67, 75, 4, 67),
(NULL, 67, 79, 4, 67),
(NULL, 67, 81, 4, 67),
(NULL, 67, 96, 4, 67),
(NULL, 67, 150, 4, 67),
(NULL, 68, 54, 4, 68),
(NULL, 68, 57, 4, 68),
(NULL, 68, 70, 4, 68),
(NULL, 68, 75, 4, 68),
(NULL, 68, 79, 4, 68),
(NULL, 68, 81, 4, 68),
(NULL, 68, 86, 4, 68),
(NULL, 68, 96, 4, 68),
(NULL, 68, 150, 4, 68),
(NULL, 69, 54, 4, 69),
(NULL, 69, 57, 4, 69),
(NULL, 69, 70, 4, 69),
(NULL, 69, 75, 4, 69),
(NULL, 69, 79, 4, 69),
(NULL, 69, 81, 4, 69),
(NULL, 69, 86, 4, 69),
(NULL, 69, 96, 4, 69),
(NULL, 69, 150, 4, 69),
(NULL, 70, 54, 4, 64),
(NULL, 70, 54, 4, 70),
(NULL, 70, 57, 4, 70),
(NULL, 70, 70, 4, 70),
(NULL, 70, 75, 4, 64),
(NULL, 70, 79, 4, 70),
(NULL, 70, 81, 4, 70),
(NULL, 70, 96, 4, 70),
(NULL, 70, 150, 4, 70),
(NULL, 71, 54, 4, 71),
(NULL, 71, 57, 4, 71),
(NULL, 71, 70, 4, 71),
(NULL, 71, 75, 4, 70),
(NULL, 71, 75, 4, 71),
(NULL, 71, 75, 4, 72),
(NULL, 71, 79, 4, 71),
(NULL, 71, 81, 4, 71),
(NULL, 71, 96, 4, 71),
(NULL, 71, 150, 4, 71),
(NULL, 71, 150, 4, 74),
(NULL, 72, 54, 4, 72),
(NULL, 72, 57, 4, 72),
(NULL, 72, 70, 4, 72),
(NULL, 72, 79, 4, 72),
(NULL, 72, 81, 4, 72),
(NULL, 72, 86, 4, 72),
(NULL, 72, 96, 4, 72),
(NULL, 72, 150, 4, 72),
(NULL, 73, 54, 4, 73),
(NULL, 73, 57, 4, 73),
(NULL, 73, 70, 4, 73),
(NULL, 73, 79, 4, 73),
(NULL, 73, 81, 4, 73),
(NULL, 73, 96, 4, 73),
(NULL, 73, 150, 4, 73),
(NULL, 74, 54, 4, 74),
(NULL, 74, 57, 4, 74),
(NULL, 74, 70, 4, 74),
(NULL, 74, 75, 4, 74),
(NULL, 74, 79, 4, 74),
(NULL, 74, 81, 4, 74),
(NULL, 74, 86, 4, 74),
(NULL, 74, 96, 4, 74),
(NULL, 75, 41, 8, 75),
(NULL, 75, 41, 8, 100),
(NULL, 75, 47, 8, 75),
(NULL, 75, 54, 8, 75),
(NULL, 75, 69, 8, 75),
(NULL, 75, 70, 8, 75),
(NULL, 75, 71, 8, 75),
(NULL, 75, 72, 8, 75),
(NULL, 75, 79, 8, 75),
(NULL, 75, 81, 8, 75),
(NULL, 75, 82, 8, 75),
(NULL, 75, 93, 8, 75),
(NULL, 75, 94, 8, 75),
(NULL, 75, 97, 8, 75),
(NULL, 75, 99, 8, 75),
(NULL, 75, 125, 8, 75),
(NULL, 76, 41, 8, 76),
(NULL, 76, 47, 8, 76),
(NULL, 76, 54, 8, 76),
(NULL, 76, 69, 8, 79),
(NULL, 76, 70, 8, 76),
(NULL, 76, 71, 8, 76),
(NULL, 76, 72, 8, 76),
(NULL, 76, 79, 8, 76),
(NULL, 76, 81, 8, 76),
(NULL, 76, 93, 8, 76),
(NULL, 76, 94, 8, 76),
(NULL, 76, 97, 8, 76),
(NULL, 76, 99, 8, 76),
(NULL, 76, 125, 8, 76),
(NULL, 77, 41, 8, 77),
(NULL, 77, 47, 8, 77),
(NULL, 77, 54, 8, 77),
(NULL, 77, 59, 8, 77),
(NULL, 77, 69, 8, 77),
(NULL, 77, 70, 8, 77),
(NULL, 77, 71, 8, 77),
(NULL, 77, 72, 8, 77),
(NULL, 77, 79, 8, 77),
(NULL, 77, 81, 8, 77),
(NULL, 77, 82, 8, 77),
(NULL, 77, 93, 8, 77),
(NULL, 77, 94, 8, 77),
(NULL, 77, 97, 8, 77),
(NULL, 77, 99, 8, 77),
(NULL, 77, 125, 8, 77),
(NULL, 78, 41, 8, 78),
(NULL, 78, 47, 8, 78),
(NULL, 78, 54, 8, 78),
(NULL, 78, 59, 8, 78),
(NULL, 78, 69, 8, 78),
(NULL, 78, 70, 8, 78),
(NULL, 78, 71, 8, 78),
(NULL, 78, 72, 8, 78),
(NULL, 78, 79, 8, 78),
(NULL, 78, 81, 8, 78),
(NULL, 78, 82, 8, 78),
(NULL, 78, 93, 8, 78),
(NULL, 78, 94, 8, 78),
(NULL, 78, 97, 8, 78),
(NULL, 78, 99, 8, 78),
(NULL, 78, 125, 8, 78),
(NULL, 79, 41, 8, 79),
(NULL, 79, 47, 8, 79),
(NULL, 79, 54, 8, 79),
(NULL, 79, 59, 8, 79),
(NULL, 79, 70, 8, 79),
(NULL, 79, 71, 8, 79),
(NULL, 79, 72, 8, 79),
(NULL, 79, 79, 8, 79),
(NULL, 79, 81, 8, 79),
(NULL, 79, 82, 8, 79),
(NULL, 79, 82, 8, 94),
(NULL, 79, 93, 8, 79),
(NULL, 79, 94, 8, 79),
(NULL, 79, 97, 8, 79),
(NULL, 79, 99, 8, 79),
(NULL, 80, 41, 8, 80),
(NULL, 80, 41, 8, 85),
(NULL, 80, 41, 8, 90),
(NULL, 80, 47, 8, 80),
(NULL, 80, 54, 8, 80),
(NULL, 80, 54, 8, 94),
(NULL, 80, 69, 8, 80),
(NULL, 80, 70, 8, 80),
(NULL, 80, 71, 8, 80),
(NULL, 80, 72, 8, 80),
(NULL, 80, 79, 8, 80),
(NULL, 80, 81, 8, 80),
(NULL, 80, 82, 8, 80),
(NULL, 80, 93, 8, 80),
(NULL, 80, 94, 8, 80),
(NULL, 80, 97, 8, 80),
(NULL, 80, 99, 8, 80),
(NULL, 80, 125, 8, 80),
(NULL, 81, 41, 8, 81),
(NULL, 81, 47, 8, 81),
(NULL, 81, 54, 8, 81),
(NULL, 81, 69, 8, 81),
(NULL, 81, 70, 8, 81),
(NULL, 81, 72, 8, 81),
(NULL, 81, 79, 8, 81),
(NULL, 81, 81, 8, 81),
(NULL, 81, 82, 8, 81),
(NULL, 81, 93, 8, 81),
(NULL, 81, 94, 8, 81),
(NULL, 81, 97, 8, 81),
(NULL, 81, 99, 8, 81),
(NULL, 82, 47, 8, 82),
(NULL, 82, 54, 8, 82),
(NULL, 82, 69, 8, 82),
(NULL, 82, 72, 8, 82),
(NULL, 82, 79, 8, 82),
(NULL, 82, 81, 8, 82),
(NULL, 82, 82, 8, 82),
(NULL, 82, 94, 8, 82),
(NULL, 82, 97, 8, 82),
(NULL, 82, 99, 8, 82),
(NULL, 82, 125, 8, 82),
(NULL, 83, 41, 8, 83),
(NULL, 83, 47, 8, 83),
(NULL, 83, 54, 8, 83),
(NULL, 83, 69, 8, 83),
(NULL, 83, 70, 8, 83),
(NULL, 83, 71, 8, 83),
(NULL, 83, 72, 8, 83),
(NULL, 83, 79, 8, 83),
(NULL, 83, 81, 8, 83),
(NULL, 83, 82, 8, 83),
(NULL, 83, 93, 8, 83),
(NULL, 83, 94, 8, 83),
(NULL, 83, 97, 8, 83),
(NULL, 83, 99, 8, 83),
(NULL, 83, 125, 8, 83),
(NULL, 84, 41, 8, 84),
(NULL, 84, 47, 8, 84),
(NULL, 84, 54, 8, 84),
(NULL, 84, 69, 8, 84),
(NULL, 84, 69, 8, 98),
(NULL, 84, 70, 8, 84),
(NULL, 84, 71, 8, 81),
(NULL, 84, 71, 8, 84),
(NULL, 84, 79, 8, 84),
(NULL, 84, 81, 8, 84),
(NULL, 84, 82, 8, 84),
(NULL, 84, 93, 8, 84),
(NULL, 84, 94, 8, 84),
(NULL, 84, 97, 8, 84),
(NULL, 84, 99, 8, 84),
(NULL, 84, 125, 8, 84),
(NULL, 85, 41, 8, 82),
(NULL, 85, 47, 8, 85),
(NULL, 85, 54, 8, 85),
(NULL, 85, 59, 8, 76),
(NULL, 85, 59, 8, 85),
(NULL, 85, 69, 8, 85),
(NULL, 85, 70, 8, 82),
(NULL, 85, 70, 8, 85),
(NULL, 85, 71, 8, 85),
(NULL, 85, 72, 8, 85),
(NULL, 85, 79, 8, 85),
(NULL, 85, 81, 8, 85),
(NULL, 85, 82, 8, 85),
(NULL, 85, 93, 8, 82),
(NULL, 85, 93, 8, 85),
(NULL, 85, 94, 8, 85),
(NULL, 85, 97, 8, 85),
(NULL, 85, 99, 8, 85),
(NULL, 85, 125, 8, 79),
(NULL, 85, 125, 8, 85),
(NULL, 86, 41, 8, 86),
(NULL, 86, 47, 8, 86),
(NULL, 86, 54, 8, 86),
(NULL, 86, 59, 8, 86),
(NULL, 86, 69, 8, 86),
(NULL, 86, 70, 8, 86),
(NULL, 86, 71, 8, 86),
(NULL, 86, 72, 8, 86),
(NULL, 86, 79, 8, 86),
(NULL, 86, 81, 8, 86),
(NULL, 86, 82, 8, 86),
(NULL, 86, 93, 8, 86),
(NULL, 86, 94, 8, 86),
(NULL, 86, 97, 8, 86),
(NULL, 86, 99, 8, 86),
(NULL, 86, 125, 8, 86),
(NULL, 86, 125, 8, 94),
(NULL, 87, 41, 8, 87),
(NULL, 87, 47, 8, 87),
(NULL, 87, 54, 8, 87),
(NULL, 87, 69, 8, 87),
(NULL, 87, 70, 8, 87),
(NULL, 87, 71, 8, 87),
(NULL, 87, 72, 8, 87),
(NULL, 87, 79, 8, 87),
(NULL, 87, 81, 8, 87),
(NULL, 87, 82, 8, 87),
(NULL, 87, 93, 8, 87),
(NULL, 87, 94, 8, 87),
(NULL, 87, 97, 8, 87),
(NULL, 87, 99, 8, 87),
(NULL, 87, 125, 8, 87),
(NULL, 88, 41, 8, 88),
(NULL, 88, 47, 8, 88),
(NULL, 88, 54, 8, 88),
(NULL, 88, 59, 8, 88),
(NULL, 88, 69, 8, 88),
(NULL, 88, 70, 8, 88),
(NULL, 88, 71, 8, 88),
(NULL, 88, 72, 8, 88),
(NULL, 88, 79, 8, 88),
(NULL, 88, 81, 8, 88),
(NULL, 88, 82, 8, 88),
(NULL, 88, 93, 8, 88),
(NULL, 88, 94, 8, 88),
(NULL, 88, 97, 8, 88),
(NULL, 88, 99, 8, 88),
(NULL, 88, 125, 8, 88),
(NULL, 88, 125, 8, 100),
(NULL, 89, 41, 8, 89),
(NULL, 89, 47, 8, 89),
(NULL, 89, 54, 8, 89),
(NULL, 89, 69, 8, 89),
(NULL, 89, 70, 8, 89),
(NULL, 89, 71, 8, 89),
(NULL, 89, 72, 8, 89),
(NULL, 89, 79, 8, 89),
(NULL, 89, 81, 8, 89),
(NULL, 89, 82, 8, 89),
(NULL, 89, 93, 8, 89),
(NULL, 89, 94, 8, 89),
(NULL, 89, 97, 8, 89),
(NULL, 89, 99, 8, 89),
(NULL, 89, 125, 8, 89),
(NULL, 90, 47, 8, 90),
(NULL, 90, 54, 8, 90),
(NULL, 90, 59, 8, 91),
(NULL, 90, 69, 8, 90),
(NULL, 90, 70, 8, 90),
(NULL, 90, 71, 8, 90),
(NULL, 90, 72, 8, 95),
(NULL, 90, 79, 8, 90),
(NULL, 90, 81, 8, 90),
(NULL, 90, 82, 8, 90),
(NULL, 90, 82, 8, 95),
(NULL, 90, 93, 8, 90),
(NULL, 90, 94, 8, 90),
(NULL, 90, 97, 8, 90),
(NULL, 90, 99, 8, 90),
(NULL, 90, 125, 8, 90),
(NULL, 91, 47, 8, 91),
(NULL, 91, 54, 8, 91),
(NULL, 91, 59, 8, 82),
(NULL, 91, 69, 8, 76),
(NULL, 91, 69, 8, 91),
(NULL, 91, 69, 8, 95),
(NULL, 91, 70, 8, 91),
(NULL, 91, 71, 8, 91),
(NULL, 91, 72, 8, 91),
(NULL, 91, 79, 8, 91),
(NULL, 91, 81, 8, 91),
(NULL, 91, 82, 8, 91),
(NULL, 91, 93, 8, 91),
(NULL, 91, 94, 8, 91),
(NULL, 91, 97, 8, 91),
(NULL, 91, 99, 8, 91),
(NULL, 91, 125, 8, 91),
(NULL, 91, 125, 8, 95),
(NULL, 92, 41, 8, 91),
(NULL, 92, 41, 8, 92),
(NULL, 92, 47, 8, 92),
(NULL, 92, 54, 8, 92),
(NULL, 92, 69, 8, 92),
(NULL, 92, 70, 8, 92),
(NULL, 92, 71, 8, 92),
(NULL, 92, 79, 8, 92),
(NULL, 92, 81, 8, 92),
(NULL, 92, 82, 8, 92),
(NULL, 92, 93, 8, 92),
(NULL, 92, 94, 8, 92),
(NULL, 92, 97, 8, 92),
(NULL, 92, 99, 8, 92),
(NULL, 92, 125, 8, 92),
(NULL, 93, 41, 8, 93),
(NULL, 93, 47, 8, 93),
(NULL, 93, 54, 8, 93),
(NULL, 93, 69, 8, 93),
(NULL, 93, 70, 8, 93),
(NULL, 93, 71, 8, 93),
(NULL, 93, 72, 8, 92),
(NULL, 93, 72, 8, 93),
(NULL, 93, 79, 8, 93),
(NULL, 93, 81, 8, 93),
(NULL, 93, 82, 8, 93),
(NULL, 93, 93, 8, 93),
(NULL, 93, 94, 8, 93),
(NULL, 93, 97, 8, 93),
(NULL, 93, 99, 8, 93),
(NULL, 93, 125, 8, 93),
(NULL, 94, 41, 8, 94),
(NULL, 94, 47, 8, 94),
(NULL, 94, 59, 8, 94),
(NULL, 94, 69, 8, 94),
(NULL, 94, 71, 8, 94),
(NULL, 94, 72, 8, 90),
(NULL, 94, 72, 8, 94),
(NULL, 94, 79, 8, 94),
(NULL, 94, 81, 8, 94),
(NULL, 94, 93, 8, 94),
(NULL, 94, 94, 8, 94),
(NULL, 94, 97, 8, 94),
(NULL, 94, 99, 8, 94),
(NULL, 95, 41, 8, 95),
(NULL, 95, 47, 8, 95),
(NULL, 95, 54, 8, 95),
(NULL, 95, 59, 8, 75),
(NULL, 95, 70, 8, 95),
(NULL, 95, 71, 8, 95),
(NULL, 95, 72, 8, 84),
(NULL, 95, 79, 8, 95),
(NULL, 95, 81, 8, 95),
(NULL, 95, 82, 8, 76),
(NULL, 95, 93, 8, 95),
(NULL, 95, 94, 8, 95),
(NULL, 95, 97, 8, 95),
(NULL, 95, 99, 8, 95),
(NULL, 95, 125, 8, 81),
(NULL, 96, 41, 8, 96),
(NULL, 96, 47, 8, 96),
(NULL, 96, 54, 8, 96),
(NULL, 96, 69, 8, 96),
(NULL, 96, 70, 8, 96),
(NULL, 96, 71, 8, 96),
(NULL, 96, 72, 8, 96),
(NULL, 96, 79, 8, 96),
(NULL, 96, 81, 8, 96),
(NULL, 96, 82, 8, 96),
(NULL, 96, 93, 8, 96),
(NULL, 96, 94, 8, 96),
(NULL, 96, 97, 8, 96),
(NULL, 96, 99, 8, 96),
(NULL, 96, 125, 8, 96),
(NULL, 97, 41, 8, 97),
(NULL, 97, 47, 8, 97),
(NULL, 97, 54, 8, 97),
(NULL, 97, 69, 8, 97),
(NULL, 97, 70, 8, 97),
(NULL, 97, 71, 8, 97),
(NULL, 97, 72, 8, 97),
(NULL, 97, 79, 8, 97),
(NULL, 97, 81, 8, 97),
(NULL, 97, 82, 8, 97),
(NULL, 97, 93, 8, 97),
(NULL, 97, 93, 8, 99),
(NULL, 97, 94, 8, 97),
(NULL, 97, 97, 8, 97),
(NULL, 97, 99, 8, 97),
(NULL, 97, 125, 8, 97),
(NULL, 98, 41, 8, 98),
(NULL, 98, 47, 8, 98),
(NULL, 98, 54, 8, 98),
(NULL, 98, 70, 8, 98),
(NULL, 98, 71, 8, 82),
(NULL, 98, 71, 8, 98),
(NULL, 98, 72, 8, 98),
(NULL, 98, 79, 8, 98),
(NULL, 98, 81, 8, 98),
(NULL, 98, 82, 8, 98),
(NULL, 98, 93, 8, 98),
(NULL, 98, 94, 8, 98),
(NULL, 98, 97, 8, 98),
(NULL, 98, 99, 8, 98),
(NULL, 99, 41, 8, 99),
(NULL, 99, 47, 8, 99),
(NULL, 99, 54, 8, 99),
(NULL, 99, 69, 8, 99),
(NULL, 99, 70, 8, 99),
(NULL, 99, 71, 8, 99),
(NULL, 99, 72, 8, 99),
(NULL, 99, 79, 8, 99),
(NULL, 99, 81, 8, 99),
(NULL, 99, 82, 8, 99),
(NULL, 99, 94, 8, 99),
(NULL, 99, 97, 8, 99),
(NULL, 99, 99, 8, 99),
(NULL, 99, 125, 8, 98),
(NULL, 99, 125, 8, 99),
(NULL, 100, 47, 8, 100),
(NULL, 100, 54, 8, 100),
(NULL, 100, 59, 8, 100),
(NULL, 100, 69, 8, 100),
(NULL, 100, 70, 8, 94),
(NULL, 100, 70, 8, 100),
(NULL, 100, 71, 8, 100),
(NULL, 100, 72, 8, 100),
(NULL, 100, 79, 8, 100),
(NULL, 100, 81, 8, 100),
(NULL, 100, 82, 8, 100),
(NULL, 100, 93, 8, 100),
(NULL, 100, 94, 8, 100),
(NULL, 100, 97, 8, 100),
(NULL, 100, 99, 8, 100),
(NULL, 101, 41, 7, 101),
(NULL, 101, 54, 7, 101),
(NULL, 101, 58, 7, 101),
(NULL, 101, 63, 7, 101),
(NULL, 101, 69, 7, 101),
(NULL, 101, 70, 7, 101),
(NULL, 101, 71, 7, 101),
(NULL, 101, 75, 7, 101),
(NULL, 101, 79, 7, 101),
(NULL, 101, 81, 7, 101),
(NULL, 101, 82, 7, 101),
(NULL, 101, 83, 7, 101),
(NULL, 101, 85, 7, 101),
(NULL, 101, 85, 7, 109),
(NULL, 101, 94, 7, 101),
(NULL, 101, 96, 7, 101),
(NULL, 101, 97, 7, 101),
(NULL, 101, 101, 7, 101),
(NULL, 101, 125, 7, 101),
(NULL, 101, 141, 7, 101),
(NULL, 101, 141, 7, 105),
(NULL, 102, 54, 7, 102),
(NULL, 102, 58, 7, 102),
(NULL, 102, 69, 7, 102),
(NULL, 102, 70, 7, 102),
(NULL, 102, 71, 7, 102),
(NULL, 102, 75, 7, 102),
(NULL, 102, 79, 7, 102),
(NULL, 102, 81, 7, 102),
(NULL, 102, 82, 7, 102),
(NULL, 102, 83, 7, 102),
(NULL, 102, 83, 7, 107),
(NULL, 102, 85, 7, 102),
(NULL, 102, 94, 7, 102),
(NULL, 102, 96, 7, 102),
(NULL, 102, 97, 7, 102),
(NULL, 102, 101, 7, 102),
(NULL, 102, 125, 7, 102),
(NULL, 102, 141, 7, 108),
(NULL, 103, 41, 7, 103),
(NULL, 103, 46, 7, 103),
(NULL, 103, 54, 7, 103),
(NULL, 103, 54, 7, 108),
(NULL, 103, 58, 7, 103),
(NULL, 103, 63, 7, 103),
(NULL, 103, 69, 7, 103),
(NULL, 103, 70, 7, 103),
(NULL, 103, 71, 7, 103),
(NULL, 103, 75, 7, 103),
(NULL, 103, 79, 7, 103),
(NULL, 103, 81, 7, 103),
(NULL, 103, 82, 7, 103),
(NULL, 103, 83, 7, 103),
(NULL, 103, 85, 7, 103),
(NULL, 103, 94, 7, 103),
(NULL, 103, 96, 7, 103),
(NULL, 103, 97, 7, 103),
(NULL, 103, 101, 7, 103),
(NULL, 103, 125, 7, 103),
(NULL, 103, 125, 7, 107),
(NULL, 103, 141, 7, 103),
(NULL, 104, 41, 7, 104),
(NULL, 104, 54, 7, 104),
(NULL, 104, 58, 7, 104),
(NULL, 104, 63, 7, 104),
(NULL, 104, 69, 7, 104),
(NULL, 104, 70, 7, 104),
(NULL, 104, 71, 7, 104),
(NULL, 104, 75, 7, 104),
(NULL, 104, 79, 7, 104),
(NULL, 104, 81, 7, 104),
(NULL, 104, 82, 7, 104),
(NULL, 104, 83, 7, 104),
(NULL, 104, 85, 7, 104),
(NULL, 104, 94, 7, 104),
(NULL, 104, 96, 7, 104),
(NULL, 104, 97, 7, 104),
(NULL, 104, 101, 7, 104),
(NULL, 104, 125, 7, 104),
(NULL, 104, 141, 7, 104),
(NULL, 104, 141, 7, 107),
(NULL, 105, 54, 7, 105),
(NULL, 105, 58, 7, 105),
(NULL, 105, 63, 7, 105),
(NULL, 105, 69, 7, 105),
(NULL, 105, 70, 7, 105),
(NULL, 105, 71, 7, 105),
(NULL, 105, 75, 7, 105),
(NULL, 105, 79, 7, 105),
(NULL, 105, 81, 7, 105),
(NULL, 105, 82, 7, 105),
(NULL, 105, 83, 7, 105),
(NULL, 105, 85, 7, 105),
(NULL, 105, 94, 7, 105),
(NULL, 105, 96, 7, 105),
(NULL, 105, 97, 7, 105),
(NULL, 105, 101, 7, 105),
(NULL, 105, 125, 7, 105),
(NULL, 106, 54, 7, 106),
(NULL, 106, 58, 7, 106),
(NULL, 106, 63, 7, 106),
(NULL, 106, 69, 7, 106),
(NULL, 106, 70, 7, 106),
(NULL, 106, 71, 7, 106),
(NULL, 106, 75, 7, 106),
(NULL, 106, 79, 7, 106),
(NULL, 106, 81, 7, 106),
(NULL, 106, 82, 7, 106),
(NULL, 106, 83, 7, 106),
(NULL, 106, 85, 7, 106),
(NULL, 106, 94, 7, 106),
(NULL, 106, 96, 7, 106),
(NULL, 106, 97, 7, 106),
(NULL, 106, 101, 7, 106),
(NULL, 106, 125, 7, 106),
(NULL, 106, 141, 7, 102),
(NULL, 106, 141, 7, 106),
(NULL, 107, 41, 7, 107),
(NULL, 107, 54, 7, 107),
(NULL, 107, 58, 7, 107),
(NULL, 107, 63, 7, 102),
(NULL, 107, 63, 7, 107),
(NULL, 107, 69, 7, 107),
(NULL, 107, 70, 7, 107),
(NULL, 107, 71, 7, 107),
(NULL, 107, 75, 7, 107),
(NULL, 107, 79, 7, 107),
(NULL, 107, 81, 7, 107),
(NULL, 107, 82, 7, 107),
(NULL, 107, 85, 7, 108),
(NULL, 107, 94, 7, 107),
(NULL, 107, 96, 7, 107),
(NULL, 107, 97, 7, 107),
(NULL, 107, 101, 7, 107),
(NULL, 108, 58, 7, 108),
(NULL, 108, 63, 7, 108),
(NULL, 108, 69, 7, 108),
(NULL, 108, 70, 7, 108),
(NULL, 108, 71, 7, 108),
(NULL, 108, 75, 7, 108),
(NULL, 108, 79, 7, 108),
(NULL, 108, 81, 7, 108),
(NULL, 108, 82, 7, 108),
(NULL, 108, 83, 7, 108),
(NULL, 108, 94, 7, 108),
(NULL, 108, 96, 7, 108),
(NULL, 108, 97, 7, 108),
(NULL, 108, 101, 7, 108),
(NULL, 108, 125, 7, 108),
(NULL, 109, 54, 7, 109),
(NULL, 109, 58, 7, 109),
(NULL, 109, 63, 7, 109),
(NULL, 109, 69, 7, 109),
(NULL, 109, 70, 7, 109),
(NULL, 109, 71, 7, 109),
(NULL, 109, 75, 7, 109),
(NULL, 109, 79, 7, 109),
(NULL, 109, 81, 7, 109),
(NULL, 109, 82, 7, 109),
(NULL, 109, 85, 7, 107),
(NULL, 109, 94, 7, 109),
(NULL, 109, 96, 7, 109),
(NULL, 109, 97, 7, 109),
(NULL, 109, 101, 7, 109),
(NULL, 109, 141, 7, 109),
(NULL, 110, 54, 7, 110),
(NULL, 110, 58, 7, 110),
(NULL, 110, 63, 7, 110),
(NULL, 110, 69, 7, 110),
(NULL, 110, 70, 7, 110),
(NULL, 110, 71, 7, 110),
(NULL, 110, 75, 7, 110),
(NULL, 110, 79, 7, 110),
(NULL, 110, 81, 7, 110),
(NULL, 110, 82, 7, 110),
(NULL, 110, 83, 7, 109),
(NULL, 110, 83, 7, 110),
(NULL, 110, 85, 7, 110),
(NULL, 110, 94, 7, 110),
(NULL, 110, 96, 7, 110),
(NULL, 110, 97, 7, 110),
(NULL, 110, 101, 7, 110),
(NULL, 110, 125, 7, 109),
(NULL, 110, 125, 7, 110),
(NULL, 110, 141, 7, 110);

-- --------------------------------------------------------

--
-- Table structure for table `resposta_frase`
--

CREATE TABLE `resposta_frase` (
  `id_resposta_frase` int(11) NOT NULL,
  `resposta_frase_correta` varchar(100) NOT NULL,
  `resposta_frase_usuario` varchar(100) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_subfase` int(11) NOT NULL,
  `cod_frase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resposta_frase`
--

INSERT INTO `resposta_frase` (`id_resposta_frase`, `resposta_frase_correta`, `resposta_frase_usuario`, `cod_usuario`, `cod_subfase`, `cod_frase`) VALUES
(14, '-141-142-16', '-141-117-16', 147, 1, 20),
(15, '-120-25', '-142-25', 147, 1, 27),
(16, '-120-23', '-142-23', 147, 1, 23),
(17, '-133-22', '-133-22', 147, 1, 18),
(18, '-25-121', '-121-15', 147, 1, 24),
(19, '-119-28', '-120-26', 147, 1, 28),
(21, '-117-121-43', '-121-119-37', 147, 2, 31),
(26, '-137-44', '-137-44', 147, 2, 21),
(27, '-117-121-8', '-117-121-8', 147, 2, 17),
(28, '-117-133-41', '-117-133-41', 147, 2, 15),
(35, '-120-25', '-20-25', 150, 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `subfase`
--

CREATE TABLE `subfase` (
  `id_subfase` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cod_fase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subfase`
--

INSERT INTO `subfase` (`id_subfase`, `nome`, `cod_fase`) VALUES
(1, 'SALA', 1),
(2, 'COZINHA', 1),
(3, 'BANHEIRO', 1),
(4, 'QUARTO', 1),
(5, 'DIRETORIA', 2),
(6, 'RECEPÇÃO', 3),
(7, 'NUMEROS', 4),
(8, 'LETRAS', 4),
(9, 'PRONOME', 4),
(10, 'VERBO', 4);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `condicao_auditiva` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `data_nascimento`, `email`, `senha`, `sexo`, `condicao_auditiva`) VALUES
(37, 'Ana Júlia Cunha', '2001-04-22', 'anajulia@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'f', 'o'),
(38, 'testex', '2020-11-03', 't@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'm', 'o'),
(39, 'Beluzo', '1999-01-01', 'beluzo2@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'f', 'o'),
(40, 'Jose - Usuário Surdo', '2000-01-01', 'surdo@teste.com', '827ccb0eea8a706c4c34a16891f84e7b', 'm', 's'),
(41, ' usuario surdo', '2021-01-06', 'surdo@teste.com.br', '81dc9bdb52d04dc20036dbd8313ed055', 'm', 's'),
(45, 'Graziele Betoni Ventriglia', '2001-02-20', 'graziele.ventriglia@aluno.ifsp.edu.br', '827ccb0eea8a706c4c34a16891f84e7b', 'f', 'o'),
(46, 'Raquel Ventriglia', '2021-01-02', 'graziroqueira.gbv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'f', 'o'),
(47, 'Rosa Gonçalves de Oliveira', '1979-09-03', 'oliveirargoncalves@gmail.com', '9ee3063bca0c0a2903631b91b3533207', 'f', 'o'),
(50, 'Ana beatriz coelho ', '2002-04-24', 'acoelho759@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'f', 'o'),
(52, 'Fatima teixeira ', '2020-08-13', 'carolleite@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'f', 'o'),
(53, 'Arthur ', '2021-01-21', 'arthur@gmail.com', '29dc20687e469f07b1e5892f9641118c', 'm', 'o'),
(54, 'Vinicius Ventriglia', '2009-11-25', 'vinicius@gmail.com', '202cb962ac59075b964b07152d234b70', 'm', 's'),
(55, 'Renan', '2021-01-07', 'renan@gmail.com', 'b5a1fc2085986034e448d2ccc5bb9703', 'm', 's'),
(57, 'Davi oliveira', '2005-05-05', 'rosa_oliveira74@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'm', 's'),
(58, 'Juliana', '2021-01-05', 'juliana@gmail.com', '202cb962ac59075b964b07152d234b70', 'f', 's'),
(59, 'Rafael Alves Ferreira', '1986-04-10', 'rafael.alves.ferreira@alumni.usp.br', '8c606a55d286fbe8785fb7a021c18cab', 'm', 'o'),
(62, 'Denise  Canola', '1978-07-28', 'deniseemidio@ifsp.edu.br', '4f813bf86834bc80991805a494c6e8fb', 'f', 'o'),
(63, 'MARIO FERNANDES VENTRIGLIA', '1972-01-11', 'marioventriglia77@gmail.com', 'a913df5191b203afa9e9d5c05bbda75a', 'm', 'o'),
(69, 'Caroline Pinto de Oliveira Ors', '1981-07-11', 'caoliorsi@gmail.com', '220a7f49d42406598587a66f02584ac3', 'f', 'o'),
(70, 'Estêvão Furquim', '1988-03-04', 'estevaofurquim@gmail.com', 'dd63d1ea7fba5e8d36e6164040d8211a', 'm', 'o'),
(71, 'Raquel Adriana Betoni Ventrigl', '1977-04-11', 'grazizi.ventri@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'f', 'o'),
(72, 'Amalia Melo', '2002-06-30', 'amalia.melo@aluno.ifsp.edu.br', '827ccb0eea8a706c4c34a16891f84e7b', 'f', 'o'),
(74, 'Keller', '1976-10-18', 'kellerbsouza@gmail.com', '1e8608169c241f27ab2867101009d5e7', 'f', 'o'),
(75, 'bruno', '2000-05-24', 'brunoyansartori@gmail.com', 'b822cfcfebbe230b56e0928d25bd3798', 'm', 'o'),
(79, 'Eder Faria Junior', '1987-09-21', 'eder_fariajunior@hotmail.com', 'f585d179ffda2cdbb57235fa7c89092b', 'm', 'o'),
(81, 'Samuel Jesus de Oliveira', '1970-12-10', 'sjoliveira@gmail.com', '5c42650a1e01502798691d6dbb07b4be', 'm', 'o'),
(82, 'Julia Costa', '2003-06-30', 'juliacosta@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'f', 'o'),
(83, 'Talita Cardim', '1989-10-14', 'talitacardim@hotmail.com', 'c453111a9136012aa9c25f3f6bab8057', 'f', 'o'),
(85, 'Lara rocha ', '2001-07-31', 'laraferreirarocha@fmail.com', '25d55ad283aa400af464c76d713c07ad', 'f', 'o'),
(86, 'Lucimar Bizio', '1963-01-16', 'prbizio@yahoo.com.br', '4d9e740818f3e491e4ecb1233fd49cb8', 'm', 'o'),
(87, 'Renan', '2001-05-24', 'Porsani', 'e1b7e7803215d5488588370572d13102', 'm', 'o'),
(88, 'Renan Henrique Porsani', '2001-05-24', 'porsani37@gmail.com', '7580adf5151c6b79c90597aeab91838f', 'm', 'o'),
(93, 'Carol', '2020-10-15', 'carolleite.kay@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'f', 'o'),
(94, 'Amanda', '2003-09-03', 'amanda@email.com', '202cb962ac59075b964b07152d234b70', 'f', 'o'),
(95, 'renan', '2001-05-24', 'email@gmail.com', '7580adf5151c6b79c90597aeab91838f', 'm', 'o'),
(96, 'Marcos Ribeiro da Silva', '1984-03-24', 'marcosrs@ifsp.edu.br', '5f1e31b78cf73d45047f96536c3c789e', 'm', 'o'),
(97, 'Julianno Lima', '1990-08-11', 'juliannolimacba@hotmail.com', '27b2c8280ccf2be6abebbde3e2d461b3', 'm', 'o'),
(98, 'Pablo', '2001-08-25', 'pablo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'm', 'o'),
(99, 'Hiago', '2004-06-04', 'miscossihiago@gmail.com', 'be0182be832ee05f30d0bb5dce306a7a', 'm', 'o'),
(101, 'Juninho', '2001-11-04', 'deoclecia.a@aluno.ifsp.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'f', 'o'),
(103, 'Henrique', '1989-05-24', 'henriquebg@ifsp.edu.br', '240fb1de4e7e4e3af9a1de09b0a31ad8', 'm', 'o'),
(114, '', '0000-00-00', '', 'd41d8cd98f00b204e9800998ecf8427e', 'f', 'o'),
(115, 'Ana Beatriz Teixeira Coelho', '2021-02-04', 'abct@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'f', 'o'),
(119, 'xfgcfhctgh', '2021-02-17', 'aaaa@gmail.com', 'b7bc2a2f5bb6d521e64c8974c143e9a0', 'f', 'o'),
(122, 'beluzo3', '2000-01-01', 'beluzo3@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'm', 'o'),
(123, 'beluzo', '2000-01-01', 'beluzo4@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'm', 's'),
(125, 'Amalia Melo', '2000-03-16', 'amalia@amalia.com', '202cb962ac59075b964b07152d234b70', 'f', 'o'),
(126, 'amandaaa', '2000-01-02', 'am@amanda.com', '123', 'f', 'o'),
(127, 'joao', '1985-11-02', 'joao@email.com', '123', 'm', 's'),
(128, 'Marcela Gonçalves', '1999-02-10', 'marcela@email.com', '289dff07669d7a23de0ef88d2f7129e7', 'f', 'o'),
(130, 'Pamela Melo', '2003-02-15', 'pamela@email.com', '202cb962ac59075b964b07152d234b70', 'f', 'o'),
(131, 'Julio Cesar ', '2004-05-06', 'julio@email.com', '202cb962ac59075b964b07152d234b70', 'm', 's'),
(132, 'joana silva', '2000-05-04', 'joana@email.com', '202cb962ac59075b964b07152d234b70', 'f', 'o'),
(133, 'Gabriel Melo', '1998-08-05', 'gabriel@email.com', '202cb962ac59075b964b07152d234b70', 'm', 'o'),
(134, 'Matheus Alencar', '2005-10-20', 'matheus@email.com', '202cb962ac59075b964b07152d234b70', 'm', 's'),
(135, 'Talita Pereira', '1995-05-26', 'talita', '202cb962ac59075b964b07152d234b70', 'f', 'o'),
(136, 'Heitor Nunes', '2002-05-14', 'heitor@email.com', '1cc39ffd758234422e1f75beadfc5fb2', 'm', 'o'),
(137, 'Paula Souza', '2000-12-20', 'paulo@email.com', '202cb962ac59075b964b07152d234b70', 'm', 'o'),
(138, 'Gustavo Deleo', '2003-04-20', 'gustavo@email.com', '202cb962ac59075b964b07152d234b70', 'm', 'o'),
(140, 'Júlia Regina Sampaio Napoleão', '2003-07-11', 'Juliaregina03@outlook.com', '67a8dbb4028e85272b6835650642635e', 'f', 'o'),
(141, 'Fernando ', '1998-06-22', 'fernando@email.com', '202cb962ac59075b964b07152d234b70', 'm', 'o'),
(142, 'milena', '2000-11-02', 'milena@email.com', '202cb962ac59075b964b07152d234b70', 'f', 's'),
(143, 'Carlos Chaves', '2008-05-25', 'carlos@email.com', '202cb962ac59075b964b07152d234b70', 'm', 'o'),
(144, 'Amália  Melo', '2002-06-20', 'amali2@email.com', '202cb962ac59075b964b07152d234b70', 'f', 'o'),
(147, 'Amália Melo', '2002-03-20', 'amalia@email.com', '202cb962ac59075b964b07152d234b70', 'f', 'o'),
(149, 'natalia melo', '2000-12-20', 'natalia@email.com', '202cb962ac59075b964b07152d234b70', 'f', 'o'),
(150, 'Francis Silveira', '1999-03-12', 'francis@email.com', '202cb962ac59075b964b07152d234b70', 'm', 's');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_subfase`
--

CREATE TABLE `usuario_subfase` (
  `id_usuario_subfase` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_subfase` int(11) NOT NULL,
  `qtd_acertos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario_subfase`
--

INSERT INTO `usuario_subfase` (`id_usuario_subfase`, `cod_usuario`, `cod_subfase`, `qtd_acertos`) VALUES
(8, 147, 1, 11),
(9, 147, 2, 12),
(10, 147, 3, 15),
(15, 150, 4, 12),
(16, 150, 1, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adiministrador`
--
ALTER TABLE `adiministrador`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`id_fase`);

--
-- Indexes for table `frase`
--
ALTER TABLE `frase`
  ADD PRIMARY KEY (`id_frase`),
  ADD KEY `cod_subfase` (`cod_subfase`);

--
-- Indexes for table `frase_palavra`
--
ALTER TABLE `frase_palavra`
  ADD PRIMARY KEY (`id_frase_palavra`),
  ADD KEY `cod_palavra` (`cod_palavra`,`cod_frase`),
  ADD KEY `frase_palavra_ibfk_1` (`cod_frase`);

--
-- Indexes for table `palavra`
--
ALTER TABLE `palavra`
  ADD PRIMARY KEY (`id_palavra`),
  ADD UNIQUE KEY `palavra` (`palavra`),
  ADD KEY `cod_subfase` (`cod_subfase`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`resposta`,`cod_usuario`,`cod_subfase`,`cod_palavra`),
  ADD KEY `cod_subfase` (`cod_subfase`),
  ADD KEY `cod_palavra` (`cod_palavra`),
  ADD KEY `cod_usuario` (`cod_usuario`) USING BTREE;

--
-- Indexes for table `resposta_frase`
--
ALTER TABLE `resposta_frase`
  ADD PRIMARY KEY (`id_resposta_frase`,`resposta_frase_usuario`,`cod_usuario`,`cod_subfase`,`cod_frase`),
  ADD KEY `cod_frase` (`cod_frase`),
  ADD KEY `cod_subfase` (`cod_subfase`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indexes for table `subfase`
--
ALTER TABLE `subfase`
  ADD PRIMARY KEY (`id_subfase`),
  ADD KEY `cod_fase` (`cod_fase`),
  ADD KEY `cod_fase_2` (`cod_fase`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuario_subfase`
--
ALTER TABLE `usuario_subfase`
  ADD PRIMARY KEY (`id_usuario_subfase`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_subfase` (`cod_subfase`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adiministrador`
--
ALTER TABLE `adiministrador`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fase`
--
ALTER TABLE `fase`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `frase`
--
ALTER TABLE `frase`
  MODIFY `id_frase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `frase_palavra`
--
ALTER TABLE `frase_palavra`
  MODIFY `id_frase_palavra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `palavra`
--
ALTER TABLE `palavra`
  MODIFY `id_palavra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `resposta_frase`
--
ALTER TABLE `resposta_frase`
  MODIFY `id_resposta_frase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subfase`
--
ALTER TABLE `subfase`
  MODIFY `id_subfase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `usuario_subfase`
--
ALTER TABLE `usuario_subfase`
  MODIFY `id_usuario_subfase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `frase`
--
ALTER TABLE `frase`
  ADD CONSTRAINT `frase_ibfk_1` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`);

--
-- Constraints for table `frase_palavra`
--
ALTER TABLE `frase_palavra`
  ADD CONSTRAINT `frase_palavra_ibfk_1` FOREIGN KEY (`cod_frase`) REFERENCES `frase` (`id_frase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frase_palavra_ibfk_2` FOREIGN KEY (`cod_palavra`) REFERENCES `palavra` (`id_palavra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `palavra`
--
ALTER TABLE `palavra`
  ADD CONSTRAINT `palavra_ibfk_1` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`) ON UPDATE CASCADE;

--
-- Constraints for table `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resposta_ibfk_3` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resposta_ibfk_4` FOREIGN KEY (`cod_palavra`) REFERENCES `palavra` (`id_palavra`) ON UPDATE CASCADE;

--
-- Constraints for table `resposta_frase`
--
ALTER TABLE `resposta_frase`
  ADD CONSTRAINT `resposta_frase_ibfk_1` FOREIGN KEY (`cod_frase`) REFERENCES `frase` (`id_frase`),
  ADD CONSTRAINT `resposta_frase_ibfk_2` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`),
  ADD CONSTRAINT `resposta_frase_ibfk_3` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `subfase`
--
ALTER TABLE `subfase`
  ADD CONSTRAINT `subfase_ibfk_1` FOREIGN KEY (`cod_fase`) REFERENCES `fase` (`id_fase`) ON UPDATE CASCADE;

--
-- Constraints for table `usuario_subfase`
--
ALTER TABLE `usuario_subfase`
  ADD CONSTRAINT `usuario_subfase_ibfk_1` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_subfase_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
