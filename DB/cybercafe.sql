-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 08-Jun-2019 às 15:24
-- Versão do servidor: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybercafe`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `vendas_pag` (`pCliente` INT, `pEmpresa` INT, `pFunc` INT, `pProdutos` INT)  BEGIN
	INSERT INTO `vendas`(`cliente`, `empresa`, `func`, `produtos`) 
    VALUES (pCliente, pEmpresa, pFunc, pProdutos);
    
    INSERT INTO `pagamentos`(`cliente`, `empresa`, `func`, `produtos`) 
    VALUES (pCliente, pEmpresa, pFunc, pProdutos);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id_admin`, `usuario`, `senha`, `empresa`) VALUES
(8, 'hugo_s', 'thepower', 5),
(9, 'brenno', 'brenno', 6),
(10, 'admin', 'admin', NULL),
(11, 'admin', 'admin', 7);

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

--
-- Extraindo dados da tabela `clientes_pontos`
--

INSERT INTO `clientes_pontos` (`id_cliente`, `nome`, `cpf`, `ponto_registrado`, `vip`) VALUES
(5, 'Pedro Silva', '123.132.123-08', 6, 'Sim'),
(7, 'Hugo Silva', '567.567.565-79', 5, 'Nao'),
(8, 'Brenno Duarte de Lima', '111.222.333.44', 7, 'Sim'),
(9, 'Maria Matos Moura Matias', '234.234.234-98', 6, 'Nao'),
(10, 'Marcio Lima Duarte', '098.123.123-45', 6, 'Sim'),
(11, 'Igor Ferreira', '234.234.234-73', 5, 'Nao'),
(12, 'AlibabÃ¡ Mohamed', 'yet-dsfd-asdf-76', 5, 'Nao');

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

--
-- Extraindo dados da tabela `noticias_empresa`
--

INSERT INTO `noticias_empresa` (`id_noticia`, `noticia`, `dta_noticia`, `usuario`, `ponto_fisico`) VALUES
(4, 'novo hamburger feito de cuzcuz', '2019-06-18', 10, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id_pag` int(11) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `func` int(11) DEFAULT NULL,
  `produtos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id_pag`, `cliente`, `empresa`, `func`, `produtos`) VALUES
(2, 5, 6, 10, 3),
(3, 8, 7, 10, 3);

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

--
-- Extraindo dados da tabela `pontos_fisicos`
--

INSERT INTO `pontos_fisicos` (`id_ponto`, `cnpj`, `nome_comercial`, `tipo`, `contrato`, `maquinas_ativas`) VALUES
(5, '123123123-x', 'CafÃ© com Sabor', 'Pequeno', 'Simples', '10'),
(6, '9864882-y', 'VÃ³ Lila', 'Pequeno', 'VIP', '2'),
(7, '121342342341', 'CyberCafe  Â©', 'Medio', 'VIP', '200');

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
  `cliente` int(11) NOT NULL,
  `funcionario` int(11) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_prod`, `categoria`, `tipo`, `preco`, `cliente`, `funcionario`, `empresa`) VALUES
(3, 'CafÃ© Late Machiatto', 'bebidas', 'Cafeteria e derivados', 5, 5, 12, 6),
(4, 'Sonho Recheado com amor', 'PÃ£es e Doces', 'Comum', 5.5, 5, 12, 5),
(5, 'teset', 'teset', 'teset', 89, 5, NULL, NULL);

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
-- Extraindo dados da tabela `usuarios_pontos`
--

INSERT INTO `usuarios_pontos` (`id_usuario`, `funcionarios`, `adm_ponto`) VALUES
(10, 'Jeff Bezos', 6),
(11, 'JosÃ© Maria', 6),
(12, 'Marcos Lima', 5),
(13, 'Jeniffer Ferreira', 6),
(14, 'Steve Jobs', 7),
(15, 'Wilson', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `func` int(11) DEFAULT NULL,
  `produtos` int(11) DEFAULT NULL,
  `pagamento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `cliente`, `empresa`, `func`, `produtos`, `pagamento`) VALUES
(27, 8, 6, 11, 3, 'CartÃ£o de crÃ©dito'),
(28, 9, 5, 12, 4, 'Bitcoin'),
(29, 5, 6, 15, 3, 'Dinheiro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_administradores_empresa_idx` (`empresa`);

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
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id_pag`),
  ADD KEY `fk_pagamentos_cli_idx` (`cliente`),
  ADD KEY `fk_pagamentos_emp_idx` (`empresa`),
  ADD KEY `fk_pagamentos_func_idx` (`func`),
  ADD KEY `fk_pagamentos_prod_idx` (`produtos`);

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
  ADD KEY `fk_produtos_1_idx` (`cliente`),
  ADD KEY `fk_produtos_func_idx` (`funcionario`),
  ADD KEY `fk_produtos_2_idx` (`empresa`);

--
-- Indexes for table `usuarios_pontos`
--
ALTER TABLE `usuarios_pontos`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuarios_pontos_1_idx` (`adm_ponto`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `fk_vendas_1_idx` (`cliente`),
  ADD KEY `fk_vendas_2_idx` (`empresa`),
  ADD KEY `fk_vendas_3_idx` (`func`),
  ADD KEY `fk_vendas_prod_idx` (`produtos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `clientes_pontos`
--
ALTER TABLE `clientes_pontos`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `noticias_empresa`
--
ALTER TABLE `noticias_empresa`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id_pag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pontos_fisicos`
--
ALTER TABLE `pontos_fisicos`
  MODIFY `id_ponto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuarios_pontos`
--
ALTER TABLE `usuarios_pontos`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `fk_administradores_empresa` FOREIGN KEY (`empresa`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fk_pagamentos_cli` FOREIGN KEY (`cliente`) REFERENCES `clientes_pontos` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pagamentos_emp` FOREIGN KEY (`empresa`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pagamentos_func` FOREIGN KEY (`func`) REFERENCES `usuarios_pontos` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pagamentos_prod` FOREIGN KEY (`produtos`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_1` FOREIGN KEY (`cliente`) REFERENCES `clientes_pontos` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos_2` FOREIGN KEY (`empresa`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos_func` FOREIGN KEY (`funcionario`) REFERENCES `usuarios_pontos` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios_pontos`
--
ALTER TABLE `usuarios_pontos`
  ADD CONSTRAINT `fk_usuarios_pontos_1` FOREIGN KEY (`adm_ponto`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_cliente` FOREIGN KEY (`cliente`) REFERENCES `clientes_pontos` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_empresa` FOREIGN KEY (`empresa`) REFERENCES `pontos_fisicos` (`id_ponto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_prod` FOREIGN KEY (`produtos`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_usuario` FOREIGN KEY (`func`) REFERENCES `usuarios_pontos` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
