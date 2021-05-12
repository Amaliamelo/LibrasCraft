-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Maio-2020 às 18:15
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `alternativa` char(1) NOT NULL,
  `pergunta` varchar(500) NOT NULL,
  `cod_imagem` int(11) NOT NULL,
  PRIMARY KEY (`id_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastra_palavra`
--

CREATE TABLE IF NOT EXISTS `cadastra_palavra` (
  `id_palavra` int(11) NOT NULL AUTO_INCREMENT,
  `palavra_escrita` varchar(100) NOT NULL,
  `palavra_libras` varchar(100) NOT NULL,
  `video` int(11) NOT NULL,
  `imagem` int(11) NOT NULL,
  `frase_exempo` varchar(500) NOT NULL,
  PRIMARY KEY (`id_palavra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
