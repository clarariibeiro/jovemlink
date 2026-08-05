-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/08/2026 às 22:50
-- Versão do servidor: 8.0.40
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jovemlink1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidato`
--

CREATE TABLE `candidato` (
  `idCandidato` int NOT NULL,
  `fotoCandidato` varchar(255) DEFAULT NULL,
  `nomeCandidato` varchar(250) NOT NULL,
  `cpfCandidato` varchar(14) NOT NULL,
  `dataNascimentoCandidato` date DEFAULT NULL,
  `estadoCandidato` varchar(2) DEFAULT NULL,
  `cidadeCandidato` varchar(100) DEFAULT NULL,
  `emailCandidato` varchar(150) NOT NULL,
  `senhaCandidato` varchar(255) NOT NULL,
  `nivelCandidato` varchar(20) DEFAULT 'candidato',
  `dataCadastro` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidatura`
--

CREATE TABLE `candidatura` (
  `idCandidatura` int NOT NULL,
  `idCandidato` int NOT NULL,
  `idVaga` int NOT NULL,
  `dataCandidatura` datetime DEFAULT CURRENT_TIMESTAMP,
  `statusCandidatura` varchar(50) DEFAULT 'Em Análise'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int NOT NULL,
  `fotoEmpresa` varchar(255) DEFAULT NULL,
  `nomeEmpresa` varchar(250) NOT NULL,
  `razaoSocialEmpresa` varchar(250) NOT NULL,
  `dataFundacaoEmpresa` date DEFAULT NULL,
  `cnpjEmpresa` varchar(20) NOT NULL,
  `estadoEmpresa` varchar(2) DEFAULT NULL,
  `cidadeEmpresa` varchar(100) DEFAULT NULL,
  `emailEmpresa` varchar(150) NOT NULL,
  `senhaEmpresa` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vaga`
--

CREATE TABLE `vaga` (
  `idVaga` int NOT NULL,
  `idEmpresa` int NOT NULL,
  `tituloVaga` varchar(200) NOT NULL,
  `descricaoVaga` text NOT NULL,
  `requisitosVaga` text,
  `modalidadeVaga` varchar(50) DEFAULT 'Presencial',
  `salarioVaga` decimal(10,2) DEFAULT NULL,
  `cidadeVaga` varchar(100) DEFAULT NULL,
  `estadoVaga` varchar(2) DEFAULT NULL,
  `statusVaga` varchar(20) DEFAULT 'Ativa',
  `dataCriacao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`idCandidato`),
  ADD UNIQUE KEY `cpfCandidato` (`cpfCandidato`),
  ADD UNIQUE KEY `emailCandidato` (`emailCandidato`);

--
-- Índices de tabela `candidatura`
--
ALTER TABLE `candidatura`
  ADD PRIMARY KEY (`idCandidatura`),
  ADD KEY `fk_candidatura_candidato` (`idCandidato`),
  ADD KEY `fk_candidatura_vaga` (`idVaga`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices de tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `fk_vaga_empresa` (`idEmpresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `idCandidato` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `candidatura`
--
ALTER TABLE `candidatura`
  MODIFY `idCandidatura` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `idVaga` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `candidatura`
--
ALTER TABLE `candidatura`
  ADD CONSTRAINT `fk_candidatura_candidato` FOREIGN KEY (`idCandidato`) REFERENCES `candidato` (`idCandidato`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_candidatura_vaga` FOREIGN KEY (`idVaga`) REFERENCES `vaga` (`idVaga`) ON DELETE CASCADE;

--
-- Restrições para tabelas `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `fk_vaga_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
