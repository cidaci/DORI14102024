-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/09/2024 às 04:24
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dory`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `amostras`
--

CREATE TABLE `amostras` (
  `id_reservatorio` int(11) NOT NULL,
  `data_amostra` timestamp NOT NULL DEFAULT current_timestamp(),
  `nome_reservatorio` varchar(255) NOT NULL,
  `leitura1` double DEFAULT NULL,
  `leitura2` double DEFAULT NULL,
  `leitura3` double DEFAULT NULL,
  `padrao` double DEFAULT NULL,
  `concentracao` double DEFAULT NULL,
  `desvio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `amostras`
--

INSERT INTO `amostras` (`id_reservatorio`, `data_amostra`, `nome_reservatorio`, `leitura1`, `leitura2`, `leitura3`, `padrao`, `concentracao`, `desvio`) VALUES
(1, '2024-09-01 12:07:34', 'rose', 0.023, 0.043, 0.021, 0, NULL, NULL),
(2, '2024-09-01 12:20:44', 'pati', 0.023, 0.043, 0.021, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `calibracao`
--

CREATE TABLE `calibracao` (
  `id` int(11) NOT NULL,
  `data_cali` timestamp NOT NULL DEFAULT current_timestamp(),
  `nome_reservatorio` varchar(100) DEFAULT NULL,
  `nome_proprietario` varchar(100) DEFAULT NULL,
  `leitura1_1` double DEFAULT NULL,
  `leitura1_2` double DEFAULT NULL,
  `leitura1_3` double DEFAULT NULL,
  `leitura2_1` double DEFAULT NULL,
  `leitura2_2` double DEFAULT NULL,
  `leitura2_3` double DEFAULT NULL,
  `leitura3_1` double DEFAULT NULL,
  `leitura3_2` double DEFAULT NULL,
  `leitura3_3` double DEFAULT NULL,
  `leitura4_1` double DEFAULT NULL,
  `leitura4_2` double DEFAULT NULL,
  `leitura4_3` double DEFAULT NULL,
  `leitura5_1` double DEFAULT NULL,
  `leitura5_2` double DEFAULT NULL,
  `leitura5_3` double DEFAULT NULL,
  `leitura6_1` double DEFAULT NULL,
  `leitura6_2` double DEFAULT NULL,
  `leitura6_3` double DEFAULT NULL,
  `leitura7_1` double DEFAULT NULL,
  `leitura7_2` double DEFAULT NULL,
  `leitura7_3` double DEFAULT NULL,
  `leitura8_1` double DEFAULT NULL,
  `leitura8_2` double DEFAULT NULL,
  `leitura8_3` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `calibracao`
--

INSERT INTO `calibracao` (`id`, `data_cali`, `nome_reservatorio`, `nome_proprietario`, `leitura1_1`, `leitura1_2`, `leitura1_3`, `leitura2_1`, `leitura2_2`, `leitura2_3`, `leitura3_1`, `leitura3_2`, `leitura3_3`, `leitura4_1`, `leitura4_2`, `leitura4_3`, `leitura5_1`, `leitura5_2`, `leitura5_3`, `leitura6_1`, `leitura6_2`, `leitura6_3`, `leitura7_1`, `leitura7_2`, `leitura7_3`, `leitura8_1`, `leitura8_2`, `leitura8_3`) VALUES
(5, '2024-08-30 14:43:54', 'pati', 'eu', 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345, 0.12345);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nome_propriedade` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `confirmar_senha` varchar(255) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `data_nascimento`, `nome_propriedade`, `endereco`, `senha`, `confirmar_senha`, `tipo`) VALUES
(1, 'Patricia Louise', '2024-07-30', 'roma', 'r Araucaria', '12345678', '12345678', 0),
(3, 'Jorge', '2024-08-07', 'Inglaterra', 'r Araucaria', '12345678', '12345678', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mensagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `mensagem`) VALUES
(1, 'maria', 'maria@gmail.com', 'tomara que funcione'),
(2, 'Pati', 'patricia@gmail.com', 'eu gosto de vc'),
(3, 'alegria', 'queijo@uol.com', 'Dias de Luta!\r\nDias de vitor... derrota  :p');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservatorios`
--

CREATE TABLE `reservatorios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `data_coleta` date DEFAULT NULL,
  `especie_peixe` varchar(50) DEFAULT NULL,
  `quantidade_peixes` int(11) DEFAULT NULL,
  `tamanho_medio_peixes` decimal(5,2) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reservatorios`
--

INSERT INTO `reservatorios` (`id`, `nome`, `localizacao`, `data_coleta`, `especie_peixe`, `quantidade_peixes`, `tamanho_medio_peixes`, `imagem`) VALUES
(1, 'PATINHA', 'Palotina', '2024-07-04', 'Robox', 55, 33.00, 'imagem/lago.jpeg'),
(2, 'AMARELO', 'Cascavel', '2024-05-08', 'Robox', 444, 222.00, 'imagem/laguinho.jpeg'),
(3, 'Luiz Antonio', 'Cascavel', '2024-05-09', 'Robox', 222, 23.00, 'imagem/lago2.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `amostras`
--
ALTER TABLE `amostras`
  ADD PRIMARY KEY (`id_reservatorio`);

--
-- Índices de tabela `calibracao`
--
ALTER TABLE `calibracao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `reservatorios`
--
ALTER TABLE `reservatorios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amostras`
--
ALTER TABLE `amostras`
  MODIFY `id_reservatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `calibracao`
--
ALTER TABLE `calibracao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `reservatorios`
--
ALTER TABLE `reservatorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
