-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2024 às 19:30
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd0305`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbautor`
--

CREATE TABLE `tbautor` (
  `codAutor` int(11) NOT NULL,
  `nomeAutor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbautor`
--

INSERT INTO `tbautor` (`codAutor`, `nomeAutor`) VALUES
(1, 'Colleen Hoover'),
(2, 'Agatha Christie'),
(3, 'Rick Riordan'),
(4, 'Edgar Allan Poe'),
(5, 'Matt Haig'),
(6, 'Diego Rodrigo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `codGenero` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbgenero`
--

INSERT INTO `tbgenero` (`codGenero`, `genero`) VALUES
(2, 'Romance'),
(3, 'Aventura'),
(4, 'Suspense'),
(5, 'Terror'),
(6, 'Fantasia'),
(7, 'Sexo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `codLivro` int(11) NOT NULL,
  `nomeLivro` varchar(255) NOT NULL,
  `codAutor` int(11) NOT NULL,
  `codGenero` int(11) NOT NULL,
  `anoLancamento` int(4) DEFAULT NULL,
  `edicaoLivro` varchar(50) DEFAULT NULL,
  `descricaoLivro` varchar(255) DEFAULT NULL,
  `statusLivro` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblivro`
--

INSERT INTO `tblivro` (`codLivro`, `nomeLivro`, `codAutor`, `codGenero`, `anoLancamento`, `edicaoLivro`, `descricaoLivro`, `statusLivro`) VALUES
(5, 'Percy Jackson', 3, 3, 2006, '4', 'bom', 1),
(6, 'LIVRO', 4, 5, 1984, '6', 'spooky', 0),
(7, 'LIVRO 2', 6, 7, 2024, '7', 'ONASBFOIUJABFIUYAYBVFIUABFIAF', 0),
(8, 'Pentes', 6, 5, 1999, '2', 'pentes', 1),
(9, 'renan', 1, 2, 2021, '3', 'qqqqqq', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbautor`
--
ALTER TABLE `tbautor`
  ADD PRIMARY KEY (`codAutor`);

--
-- Índices para tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`codGenero`);

--
-- Índices para tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`codLivro`),
  ADD KEY `codAutor` (`codAutor`),
  ADD KEY `codGenero` (`codGenero`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbautor`
--
ALTER TABLE `tbautor`
  MODIFY `codAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `codGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `codLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD CONSTRAINT `tblivro_ibfk_1` FOREIGN KEY (`codAutor`) REFERENCES `tbautor` (`codAutor`),
  ADD CONSTRAINT `tblivro_ibfk_2` FOREIGN KEY (`codGenero`) REFERENCES `tbgenero` (`codGenero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
