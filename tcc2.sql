-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2021 às 02:14
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc2`
--
CREATE DATABASE IF NOT EXISTS `tcc2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tcc2`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motor`
--

CREATE TABLE `motor` (
  `id` int(11) NOT NULL,
  `cliente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sistema` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potencia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voltagem` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amperagem` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bitolas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fios` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `espiras` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rpm` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotacao` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ligacao` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camada` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informacoes` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `motor`
--

INSERT INTO `motor` (`id`, `cliente`, `sistema`, `potencia`, `voltagem`, `amperagem`, `bitolas`, `fios`, `espiras`, `marca`, `rpm`, `rotacao`, `ligacao`, `camada`, `informacoes`, `imagem`) VALUES
(1, 'test', 'Monofásico', '120', '223', '155', '12', '30', '3, 5', 'marca teste', '323', 'Horário', 'Paralelo', 'Única', '', '504045.jpg'),
(2, 'dfsdfs', 'Trifásico', 'fghfg', 'fsdfs', 'fgddfg', 'gfdfdsd', '32', '32', 'new', 'fsfsd', 'Anti-Horário', 'Série', 'Única', '', '780907.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorsp`
--

CREATE TABLE `motorsp` (
  `id` int(11) NOT NULL,
  `cliente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sistema` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potencia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voltagem` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amperagem` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bitolas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fios` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `espiras` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rpm` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotacao` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ligacao` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camada` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informacoes` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `motorsp`
--

INSERT INTO `motorsp` (`id`, `cliente`, `sistema`, `potencia`, `voltagem`, `amperagem`, `bitolas`, `fios`, `espiras`, `marca`, `rpm`, `rotacao`, `ligacao`, `camada`, `informacoes`, `imagem`, `obs`) VALUES
(1, 'test2', 'Monofásico', '123', '321', '321', '23', '34', '34', 'new', '432', 'Horário', 'Paralelo', 'Dupla', '', '913227.jpg', 'dfdsfs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `codigo` int(20) NOT NULL,
  `nome` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` int(10) NOT NULL,
  `senha` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `nome`, `cpf`, `telefone`, `senha`, `cargo`) VALUES
(1, 0, 'Admin', '000.000.000-00', 0, '25d55ad283aa400af464c76d713c07ad', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `motorsp`
--
ALTER TABLE `motorsp`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `motorsp`
--
ALTER TABLE `motorsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
