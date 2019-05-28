-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 28-Maio-2019 às 09:28
-- Versão do servidor: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybercafe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_pontos`
--

CREATE TABLE `clientes_pontos` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `ponto_registrado` varchar(50) NOT NULL,
  `vip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias_empresa`
--

CREATE TABLE `noticias_empresa` (
  `id_noticia` int(11) NOT NULL,
  `noticia` varchar(255) NOT NULL,
  `dta_noticia` date DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `ponto_fisico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos_fisicos`
--

CREATE TABLE `pontos_fisicos` (
  `id_ponto` int(11) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `nome_comercial` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `contrato` varchar(50) NOT NULL,
  `maquinas_ativas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` double NOT NULL,
  `cliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_pontos`
--

CREATE TABLE `usuarios_pontos` (
  `id_usuario` int(11) NOT NULL,
  `funcionarios` varchar(100) NOT NULL,
  `adm_ponto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `clientes_pontos`
--
ALTER TABLE `clientes_pontos`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `noticias_empresa`
--
ALTER TABLE `noticias_empresa`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `pontos_fisicos`
--
ALTER TABLE `pontos_fisicos`
  ADD PRIMARY KEY (`id_ponto`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `usuarios_pontos`
--
ALTER TABLE `usuarios_pontos`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clientes_pontos`
--
ALTER TABLE `clientes_pontos`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `noticias_empresa`
--
ALTER TABLE `noticias_empresa`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pontos_fisicos`
--
ALTER TABLE `pontos_fisicos`
  MODIFY `id_ponto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios_pontos`
--
ALTER TABLE `usuarios_pontos`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
