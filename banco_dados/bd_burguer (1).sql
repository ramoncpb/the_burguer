-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Dez-2022 às 02:30
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
-- Estrutura da tabela `tb_clientes`
--

DROP TABLE IF EXISTS `tb_clientes`;
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `nomeCliente` varchar(100) NOT NULL,
  `endCliente` varchar(100) NOT NULL,
  `cepCliente` varchar(9) NOT NULL,
  `telCliente` varchar(15) NOT NULL,
  `cpfCliente` varchar(15) NOT NULL,
  `tpPagamento` varchar(10) NOT NULL,
  `dtNasc` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`nomeCliente`, `endCliente`, `cepCliente`, `telCliente`, `cpfCliente`, `tpPagamento`, `dtNasc`) VALUES
('20', '20', '20', '20', '20', 'pix', '2022-12-10'),
('123', '123', '123', '123', '123', 'pix', '2022-11-30'),
('julia', 'aaaaaaaaaaaa', '36055877', '32988451265', '84756921566', 'cartao', '2022-12-13'),
('aaaaaaaa', 'aaaaaaaaa', '36022488', '32988451200', '12548965777', 'cartao', '2022-12-23'),
('1', '1', '1', '1', '1', 'pix', '1256-04-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `login` varchar(11) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
