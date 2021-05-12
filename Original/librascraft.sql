-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Set-2020 às 03:45
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `librascraft`
--
CREATE DATABASE IF NOT EXISTS `librascraft` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `librascraft`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adiministrador`
--

CREATE TABLE IF NOT EXISTS `adiministrador` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `adiministrador`
--

INSERT INTO `adiministrador` (`id_adm`, `nome`, `email`, `senha`) VALUES
(1, 'Libras', 'librascraft@gmail.com', 'libras'),
(2, 'as', 'a@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_ouvinte`
--

CREATE TABLE IF NOT EXISTS `atividade_ouvinte` (
  `id_ouvinte` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` char(1) NOT NULL,
  `link_video` int(11) NOT NULL,
  `cod_palavra` int(11) NOT NULL,
  `alternativa_a` varchar(30) NOT NULL,
  `alternativa_b` varchar(30) NOT NULL,
  `alternativa_c` varchar(30) NOT NULL,
  `alternativa_d` varchar(30) NOT NULL,
  `enunciado` varchar(1000) NOT NULL,
  `cod_subfase` int(11) NOT NULL,
  PRIMARY KEY (`id_ouvinte`),
  KEY `cod_palavra` (`cod_palavra`),
  KEY `cod_subfase` (`cod_subfase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_surdo`
--

CREATE TABLE IF NOT EXISTS `atividade_surdo` (
  `id_surdo` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` varchar(1000) NOT NULL,
  `link_video` int(11) NOT NULL,
  `cod_palavra` int(11) NOT NULL,
  `enunciado` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_surdo`),
  KEY `cod_palavra` (`cod_palavra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase`
--

CREATE TABLE IF NOT EXISTS `fase` (
  `id_fase` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `fase`
--

INSERT INTO `fase` (`id_fase`, `nome`) VALUES
(1, 'CASA'),
(2, 'ESCOLA'),
(3, 'RESTAURANTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE IF NOT EXISTS `imagem` (
  `id_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `caminho` varchar(500) NOT NULL,
  `cod_subfase` int(11) NOT NULL,
  `cod_palavra` int(11) NOT NULL,
  PRIMARY KEY (`id_imagem`),
  KEY `cod_subfase` (`cod_subfase`),
  KEY `cod_palavra` (`cod_palavra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavra`
--

CREATE TABLE IF NOT EXISTS `palavra` (
  `id_palavra` int(11) NOT NULL AUTO_INCREMENT,
  `palavra` varchar(100) NOT NULL,
  `video_sinal` varchar(500) NOT NULL,
  `datilologia` int(11) NOT NULL,
  `figura` int(11) NOT NULL,
  `cod_subfase` int(11) NOT NULL,
  PRIMARY KEY (`id_palavra`),
  UNIQUE KEY `palavra` (`palavra`),
  KEY `cod_subfase` (`cod_subfase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `palavra`
--

INSERT INTO `palavra` (`id_palavra`, `palavra`, `video_sinal`, `datilologia`, `figura`, `cod_subfase`) VALUES
(8, 'ARMARIO', '0', 0, 0, 2),
(9, 'PANELA', '0', 0, 0, 2),
(10, 'CAMA', '0', 0, 0, 3),
(11, 'GARFO', '0', 0, 0, 2),
(12, 'CHUVEIRO', '0', 0, 0, 4),
(15, 'JANELA', '0', 0, 0, 1),
(16, 'VÍDEO GAME', '0', 0, 0, 1),
(18, 'SOFÁ', '0', 0, 0, 1),
(20, 'DVD', 'https://www.youtube.com/watch?v=DUobx9a1tCU', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavra_cadastrada`
--

CREATE TABLE IF NOT EXISTS `palavra_cadastrada` (
  `id_palavra_cadastrada` int(11) NOT NULL AUTO_INCREMENT,
  `cod_palavra` int(11) NOT NULL,
  `cod_fase` int(11) NOT NULL,
  `cod_subfase` int(11) NOT NULL,
  PRIMARY KEY (`id_palavra_cadastrada`),
  UNIQUE KEY `cod_palavra` (`cod_palavra`),
  KEY `cod_fase` (`cod_fase`),
  KEY `cod_subfase` (`cod_subfase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta_ouvinte`
--

CREATE TABLE IF NOT EXISTS `resposta_ouvinte` (
  `id_resposta_ouvinte` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` char(1) NOT NULL,
  `cod_atividade_ouvinte` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_resposta_ouvinte`),
  UNIQUE KEY `cod_atividade_o` (`cod_atividade_ouvinte`),
  UNIQUE KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta_surdo`
--

CREATE TABLE IF NOT EXISTS `resposta_surdo` (
  `id_resposta_surdo` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `cod_atividade_surdo` int(11) NOT NULL,
  PRIMARY KEY (`id_resposta_surdo`),
  KEY `cod_atividade_s` (`cod_atividade_surdo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subfase`
--

CREATE TABLE IF NOT EXISTS `subfase` (
  `id_subfase` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_fase` int(11) NOT NULL,
  PRIMARY KEY (`id_subfase`),
  KEY `cod_fase` (`cod_fase`),
  KEY `cod_fase_2` (`cod_fase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `subfase`
--

INSERT INTO `subfase` (`id_subfase`, `nome`, `cod_fase`) VALUES
(1, 'SALA', 1),
(2, 'COZINHA', 1),
(3, 'QUARTO', 1),
(4, 'BANHEIRO', 1),
(5, 'DIRETORIA', 2),
(6, 'RECEPÇÃO', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` int(11) NOT NULL,
  `sexo` char(1) NOT NULL,
  `condicao_auditiva` char(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `data_nascimento`, `email`, `senha`, `sexo`, `condicao_auditiva`) VALUES
(12, 'Rosa Oliveira', '2020-06-04', 'rosa@gmail.com', 1234, 'f', 'o'),
(16, 'Ana Laura Cunha Monteiro', '1991-09-20', 'anal@hotmail.com', 1234, 'f', 'o'),
(17, 'Vera Cunha', '1966-12-03', 'vera@gmail.com', 1234, 'f', 'o'),
(18, 'Davi Picoli', '2001-07-25', 'davi@gmail.com', 1234, 'm', 'o'),
(19, 'Ana Júlia Cunha', '2001-04-22', 'anajulia@gmail.com', 1234, 'f', 'o'),
(24, 'Marcus Vinicius Cunha', '1991-09-20', 'vi@gmail.com', 1234, 'm', 'o'),
(25, 'Lucas Corral', '1991-03-15', 'lucas@gmail.com', 12345, 'm', 'o'),
(26, 'Ryan Pietro', '2010-03-13', 'ryan@gmail.com', 1234, 'm', 'o');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividade_ouvinte`
--
ALTER TABLE `atividade_ouvinte`
  ADD CONSTRAINT `atividade_ouvinte_ibfk_1` FOREIGN KEY (`cod_palavra`) REFERENCES `palavra` (`id_palavra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `atividade_ouvinte_ibfk_2` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `atividade_surdo`
--
ALTER TABLE `atividade_surdo`
  ADD CONSTRAINT `atividade_surdo_ibfk_1` FOREIGN KEY (`cod_palavra`) REFERENCES `palavra` (`id_palavra`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`) ON UPDATE CASCADE,
  ADD CONSTRAINT `imagem_ibfk_2` FOREIGN KEY (`cod_palavra`) REFERENCES `palavra` (`id_palavra`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `palavra`
--
ALTER TABLE `palavra`
  ADD CONSTRAINT `palavra_ibfk_1` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `palavra_cadastrada`
--
ALTER TABLE `palavra_cadastrada`
  ADD CONSTRAINT `palavra_cadastrada_ibfk_1` FOREIGN KEY (`cod_palavra`) REFERENCES `palavra` (`id_palavra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `palavra_cadastrada_ibfk_2` FOREIGN KEY (`cod_fase`) REFERENCES `fase` (`id_fase`) ON UPDATE CASCADE,
  ADD CONSTRAINT `palavra_cadastrada_ibfk_3` FOREIGN KEY (`cod_subfase`) REFERENCES `subfase` (`id_subfase`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `resposta_ouvinte`
--
ALTER TABLE `resposta_ouvinte`
  ADD CONSTRAINT `resposta_ouvinte_ibfk_1` FOREIGN KEY (`cod_atividade_ouvinte`) REFERENCES `atividade_ouvinte` (`id_ouvinte`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resposta_ouvinte_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `resposta_surdo`
--
ALTER TABLE `resposta_surdo`
  ADD CONSTRAINT `resposta_surdo_ibfk_1` FOREIGN KEY (`cod_atividade_surdo`) REFERENCES `atividade_surdo` (`id_surdo`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `subfase`
--
ALTER TABLE `subfase`
  ADD CONSTRAINT `subfase_ibfk_1` FOREIGN KEY (`cod_fase`) REFERENCES `fase` (`id_fase`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
