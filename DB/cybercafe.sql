-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 01-Jun-2019 às 14:43
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
  `ponto_registrado` int(11) NOT NULL,
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
  `usuario` int(11) NOT NULL,
  `ponto_fisico` int(11) NOT NULL
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
  `nome_prod` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` double NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_pontos`
--

CREATE TABLE `usuarios_pontos` (
  `id_usuario` int(11) NOT NULL,
  `funcionarios` varchar(100) NOT NULL,
  `adm_ponto` int(11) NOT NULL
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
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_ponto_idx` (`ponto_registrado`);

--
-- Indexes for table `noticias_empresa`
--
ALTER TABLE `noticias_empresa`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_noticias_empresa_1_idx` (`ponto_fisico`),
  ADD KEY `fk_noticias_empresa_2_idx` (`usuario`);

--
-- Indexes for table `pontos_fisicos`
--
ALTER TABLE `pontos_fisicos`
  ADD PRIMARY KEY (`id_ponto`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_produtos_1_idx` (`cliente`);

--
-- Indexes for table `usuarios_pontos`
--
ALTER TABLE `usuarios_pontos`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuarios_pontos_1_idx` (`adm_ponto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `clientes_pontos`
--
ALTER TABLE `clientes_pontos`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `noticias_empresa`
--
ALTER TABLE `noticias_empresa`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pontos_fisicos`
--
ALTER TABLE `pontos_fisicos`
  MODIFY `id_ponto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios_pontos`
--
ALTER TABLE `usuarios_pontos`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clientes_pontos`
--
ALTER TABLE `clientes_pontos`
  ADD CONSTRAINT `fk_clientes_pontos_1` FOREIGN KEY (`ponto_registrado`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticias_empresa`
--
ALTER TABLE `noticias_empresa`
  ADD CONSTRAINT `fk_noticias_empresa_1` FOREIGN KEY (`ponto_fisico`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticias_empresa_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios_pontos` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_1` FOREIGN KEY (`cliente`) REFERENCES `clientes_pontos` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios_pontos`
--
ALTER TABLE `usuarios_pontos`
  ADD CONSTRAINT `fk_usuarios_pontos_1` FOREIGN KEY (`adm_ponto`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
