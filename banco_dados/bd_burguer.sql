-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Out-2022 às 01:16
-- Versão do servidor: 5.7.23
-- versão do PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_burguer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `cod_admin` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

DROP TABLE IF EXISTS `tb_clientes`;
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(50) NOT NULL,
  `end_cliente` varchar(80) NOT NULL,
  `cep_cliente` varchar(10) NOT NULL,
  `tel_cliente` varchar(11) NOT NULL,
  `cpf_cliente` varchar(15) NOT NULL,
  `tipo_pagamento` varchar(20) NOT NULL,
  `dt_nasc` date NOT NULL,
  PRIMARY KEY (`cod_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ingredientes`
--

DROP TABLE IF EXISTS `tb_ingredientes`;
CREATE TABLE IF NOT EXISTS `tb_ingredientes` (
  `cod_ingred` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ingred` varchar(30) NOT NULL,
  `preco_ingred` float NOT NULL,
  `num_estoque` int(11) NOT NULL,
  PRIMARY KEY (`cod_ingred`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_loja`
--

DROP TABLE IF EXISTS `tb_loja`;
CREATE TABLE IF NOT EXISTS `tb_loja` (
  `cnpj_loja` varchar(15) NOT NULL,
  PRIMARY KEY (`cnpj_loja`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

DROP TABLE IF EXISTS `tb_pedidos`;
CREATE TABLE IF NOT EXISTS `tb_pedidos` (
  `cod_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `ingred_esc` int(11) NOT NULL,
  `valor_pedido` float NOT NULL,
  PRIMARY KEY (`cod_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
