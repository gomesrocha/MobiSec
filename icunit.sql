-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06/12/2017 às 02:00
-- Versão do servidor: 10.1.26-MariaDB-0+deb9u1
-- Versão do PHP: 7.1.10-1+ubuntu17.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `icunit`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `qtdactiv` int(6) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura para tabela `projeto_rel`
--

CREATE TABLE `projeto_rel` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `qtdactiv` int(6) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL,
  `id_fk_projeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura para tabela `projpermiss`
--

CREATE TABLE `projpermiss` (
  `id` int(11) NOT NULL,
  `permissao` varchar(50) NOT NULL,
  `id_fk_projeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `projpermiss_rel`
--

CREATE TABLE `projpermiss_rel` (
  `id` int(11) NOT NULL,
  `permissao` varchar(50) NOT NULL,
  `id_fk_projeto_rel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projeto_rel`
--
ALTER TABLE `projeto_rel`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projpermiss`
--
ALTER TABLE `projpermiss`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projpermiss_rel`
--
ALTER TABLE `projpermiss_rel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabela `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `projeto_rel`
--
ALTER TABLE `projeto_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `projpermiss`
--
ALTER TABLE `projpermiss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `projpermiss_rel`
--
ALTER TABLE `projpermiss_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
