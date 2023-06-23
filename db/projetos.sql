-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/05/2023 às 01:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetos`
--
CREATE DATABASE IF NOT EXISTS `projetos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projetos`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atende`
--

CREATE TABLE `atende` (
  `Id_produto` int(11) NOT NULL,
  `Id_projetos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atende`
--

INSERT INTO `atende` (`Id_produto`, `Id_projetos`) VALUES
(1122, 'I22010'),
(3344, 'I22010'),
(5566, 'I23011'),
(7788, 'I22012'),
(9900, 'I20013'),
(1234, 'I22014'),
(5101, 'I22015'),
(1520, 'I22015'),
(3040, 'I22015');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contratos`
--

CREATE TABLE `contratos` (
  `Id_contrato` text NOT NULL,
  `cliente` text NOT NULL,
  `localizacao` text NOT NULL,
  `tempo_de_execucao` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `data_de_inicio` text NOT NULL,
  `data_de_entrega` text NOT NULL,
  `concluido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contratos`
--

INSERT INTO `contratos` (`Id_contrato`, `cliente`, `localizacao`, `tempo_de_execucao`, `valor`, `data_de_inicio`, `data_de_entrega`, `concluido`) VALUES
('0010', ' Fiat', ' Betim', 1460, 255000, '25/02/2022', '25/04/2022', 1),
('0011', ' Aethra', ' Contagem', 730, 100000, '14/03/2023', '14/04/2023', 0),
('0012', ' Gerdau', ' Barão', 3650, 500000, '02/07/2022', '02/12/2022', 1),
('0013', ' Usiminas', ' Betim', 730, 150000, '09/05/2020', '09/06/2020', 1),
('0014', ' Vallourec', ' Barreiro', 4380, 650000, '18/06/2022', '18/12/2022', 1),
('0015', ' AngloGold', ' Sabará', 8760, 1000000, '20/07/2022', '20/07/2023', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_compra`
--

CREATE TABLE `pedido_compra` (
  `Id_produto` int(11) NOT NULL,
  `Id_projetos` text NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Preco` text NOT NULL,
  `Data_entrega` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido_compra`
--

INSERT INTO `pedido_compra` (`Id_produto`, `Id_projetos`, `Quantidade`, `Preco`, `Data_entrega`) VALUES
(1122, 'I22010', 1, '14.532.00', '23/03/2022'),
(3344, 'I22010', 2, '2.356.00', '06/03/2023'),
(5566, 'I23011', 6, '536.66', '17/09/2022'),
(7788, 'I22012', 5, '866.20', '20/05/2020'),
(9900, 'I20013', 10, '126.80', '02/08/2022'),
(1234, 'I22014', 3, '1.102.99', '15/01/2023'),
(5101, 'I22015', 8, '126.89', '07/01/2023'),
(1520, 'I22015', 6, '7.895.00', '18/04/2023'),
(3040, 'I22015', 7, '2.562.31', '17/04/2023');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `Id_produto` int(11) NOT NULL,
  `modelo` text NOT NULL,
  `marca` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`Id_produto`, `modelo`, `marca`) VALUES
(1122, 'AB00C2', 'Siemens'),
(1234, 'KL00L8', 'Siemens'),
(1520, 'WI69DD', 'Schneider'),
(3040, 'XL24OK', 'Schneider'),
(3344, 'CD00D3', 'ABB'),
(5101, 'ZF78VV', 'Murr'),
(5566, 'EF00F5', 'Rockwell'),
(7788, 'GH00H6', 'Omron'),
(9900, 'IJ00J7', 'Balluff');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos_eletricos`
--

CREATE TABLE `projetos_eletricos` (
  `Id_projetos` text NOT NULL,
  `Id_contrato` text NOT NULL,
  `concluido` int(11) NOT NULL,
  `Subprojeto_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projetos_eletricos`
--

INSERT INTO `projetos_eletricos` (`Id_projetos`, `Id_contrato`, `concluido`, `Subprojeto_de`) VALUES
('I20013', '0013', 1, 'NULL'),
('I22010', '0010', 1, 'NULL'),
('I22012', '0012', 1, 'NULL'),
('I22014', '0014', 1, 'NULL'),
('I22015', '0015', 0, 'NULL'),
('I220S12', '0012', 1, 'I22012'),
('I220S14', '0014', 1, 'I22014'),
('I220S15', '0015', 0, 'I22015'),
('I23011', '0011', 0, 'NULL');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`Id_contrato`(45));

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`Id_produto`);

--
-- Índices de tabela `projetos_eletricos`
--
ALTER TABLE `projetos_eletricos`
  ADD PRIMARY KEY (`Id_projetos`(45));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
