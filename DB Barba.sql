-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 11, 2022 as 07:25 PM
-- Versão do Servidor: 1.0.424
-- Versão do PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `barba`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `perecivel` tinyint(1) DEFAULT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  `valor` int(10) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_produto` (`tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `perecivel`, `tipo`, `valor`, `imagem`) VALUES
(4, 'Bis', 0, '6', 4, 'https://img1.gratispng.com/20180529/kor/kisspng-bonbon-white-chocolate-bis-lacta-bis-5b0da257e887f3.8305311115276201839525.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_produto`
--

DROP TABLE IF EXISTS `tipo_produto`;
CREATE TABLE IF NOT EXISTS `tipo_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tipo_produto`
--

INSERT INTO `tipo_produto` (`id`, `nome_tipo`) VALUES
(1, 'Assado'),
(2, 'Acompanhamento'),
(3, 'Bebida'),
(4, 'Frito'),
(5, 'Folhado'),
(6, 'Doce');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `chave` varchar(20) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `chave`, `admin`, `ativo`) VALUES
(1, 'Fulana Alves', 'fulana@gmail.com', '4731300ca8212a98a4b251c99787f241', '123-456', NULL, NULL),
(14, 'Teste', 'teste@gmail.com', 'd60eca4848446cd07b90f14ee3c4be7d', '270-518', NULL, NULL);

ALTER TABLE produto
ADD CONSTRAINT fk_tipo_produto
FOREIGN KEY (tipo) REFERENCES tipo_produto(id)