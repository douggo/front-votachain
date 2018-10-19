-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Out-2018 às 15:33
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votachain`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `nome`, `numero`, `foto`) VALUES
(2, 'Jair Messias Bolsonaro', 17, 'uploads/bozo.jpg'),
(3, 'Fernando Haddad', 13, 'uploads/haddad.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato_eleicao`
--

CREATE TABLE `candidato_eleicao` (
  `id` int(11) NOT NULL,
  `id_eleicao` int(11) NOT NULL,
  `id_candidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `candidato_eleicao`
--

INSERT INTO `candidato_eleicao` (`id`, `id_eleicao`, `id_candidato`) VALUES
(1, 1, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato_eleicao_usuario`
--

CREATE TABLE `candidato_eleicao_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_candidato_eleicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `candidato_eleicao_usuario`
--

INSERT INTO `candidato_eleicao_usuario` (`id`, `id_usuario`, `id_candidato_eleicao`) VALUES
(11, 1, 1),
(16, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleicoes`
--

CREATE TABLE `eleicoes` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `periodo` varchar(10) NOT NULL,
  `ativa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eleicoes`
--

INSERT INTO `eleicoes` (`id`, `descricao`, `periodo`, `ativa`) VALUES
(1, 'Presidente do Brasil', '2019-2023', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `administrador`, `ativo`) VALUES
(1, 'Douglas da Silva', 'douglas.silva@unidavi.edu.br', 'unidavibsn2018', 1, 1),
(2, 'Marcondes Maçaneiro', 'marcondes@unidavi.edu.br', '123', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidato_eleicao`
--
ALTER TABLE `candidato_eleicao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eleicao` (`id_eleicao`),
  ADD KEY `id_candidato` (`id_candidato`);

--
-- Indexes for table `candidato_eleicao_usuario`
--
ALTER TABLE `candidato_eleicao_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidato_eleicao_id` (`id_candidato_eleicao`);

--
-- Indexes for table `eleicoes`
--
ALTER TABLE `eleicoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidato_eleicao`
--
ALTER TABLE `candidato_eleicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidato_eleicao_usuario`
--
ALTER TABLE `candidato_eleicao_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `eleicoes`
--
ALTER TABLE `eleicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `candidato_eleicao`
--
ALTER TABLE `candidato_eleicao`
  ADD CONSTRAINT `id_candidato` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id`),
  ADD CONSTRAINT `id_eleicao` FOREIGN KEY (`id_eleicao`) REFERENCES `eleicoes` (`id`);

--
-- Limitadores para a tabela `candidato_eleicao_usuario`
--
ALTER TABLE `candidato_eleicao_usuario`
  ADD CONSTRAINT `candidato_eleicao_id` FOREIGN KEY (`id_candidato_eleicao`) REFERENCES `candidato_eleicao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
