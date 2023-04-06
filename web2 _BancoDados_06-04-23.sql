-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2023 às 20:05
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `web2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaproduto`
--

CREATE TABLE `categoriaproduto` (
  `id_categoriaproduto` int(100) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoriaproduto`
--

INSERT INTO `categoriaproduto` (`id_categoriaproduto`, `nome`) VALUES
(1, 'Automotivo - Peças'),
(2, 'Suspensão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  `estado_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `email`, `telefone`, `endereco`, `numero`, `cidade`, `estado`, `status`, `estado_id`) VALUES
(1, 'bruno crepaldi', '123.456.789-10', 'bruno@gmail.com', '98877-6655', 'Rua Guatemala ', 945, 'nova olimpia', 'paraná', 'S', 0),
(2, 'joão pedro', '999.888.777-55', 'joao@outlook.com', '99988-1122', 'Rua Rio grande do sul', 22, 'Nova Olimpia', 'Paraná', 'N', 0),
(4, 'teste', '111111111', 'a@b.com', '999999999', 'rua A', 0, 'B', 'SP', 'S', 0),
(5, 'marcelo', '009.887-12', 'marcelo@gmail.com', '90908-1234', 'rua paraná', 99, 'cianorte', 'paraná', 'S', 0),
(10, 'teste combobox', '1', 'teste@g.com', '1', 't', 1, 't', 't', 'S', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `nome`) VALUES
(2, 'Paraná'),
(3, 'São Paulo'),
(4, 'Rio de Janeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupousuario`
--

CREATE TABLE `grupousuario` (
  `id_grupoUsuario` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupousuario`
--

INSERT INTO `grupousuario` (`id_grupoUsuario`, `nome`) VALUES
(1, 'Pessoas'),
(2, 'produtos'),
(3, 'listas'),
(6, 'funcionarios'),
(7, 'administrativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_login` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(255) NOT NULL,
  `medida` int(100) NOT NULL,
  `categoriaproduto_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `sigla`, `medida`, `categoriaproduto_id`) VALUES
(1, 'amortecedor gol 2006>', '', 0, NULL),
(2, 'molas santana 97 < 06', '', 0, NULL),
(3, 'lampada de freio corsa 2009 >', '', 0, NULL),
(4, 'pivo uno', '', 0, NULL),
(6, 'Bico Injetor', '', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `grupoUsuario_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `sexo`, `email`, `senha`, `grupoUsuario_id`) VALUES
(4, 'qwerty atualizado 2023', 'F', 'teste.20@yahoo.com.br', '444444', 1),
(5, 'bruno', 'M', 'crepaldi@linkedin.com', '777777777', 3),
(8, 'eduardo', 'M', 'eduardo@gmail.com', '123', 1),
(16, 'batata', 'M', 'batata@qw.com', '', 2),
(19, 'porter', 'M', 'poter@py.gov', '23', 1),
(25, 'teste 2', 'M', 'asadad@gmail.com', '123', 2),
(27, 'teste programa velho', 'M', 'testeprogramavelho@hotmail.com', '12345', 2),
(28, 'ex', 'O', 'ex@gml.com', '0000', 6),
(29, 'bruno crepaldi', 'M', 'bcrepaldi@teste.com', '123456789', 1),
(34, 'teste', 'M', 'testeLogin@gmail.com', '123', 1),
(36, 'teste login', 'M', 'log@log.com', '123', 1),
(37, 'michele', 'F', 'michele@gmail.com', '123', 1),
(38, 'rose', 'F', 'rose@teste.com', 'rose123', 6),
(40, 'teste', 'F', 'teste@teste.com.br', 'teste', 3),
(41, 'teste fora', 'O', 'dqsdsa@hjhjh.com', 'adasdds', 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  ADD PRIMARY KEY (`id_categoriaproduto`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Índices para tabela `grupousuario`
--
ALTER TABLE `grupousuario`
  ADD PRIMARY KEY (`id_grupoUsuario`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_grupoUsuario_usuario` (`grupoUsuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  MODIFY `id_categoriaproduto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `grupousuario`
--
ALTER TABLE `grupousuario`
  MODIFY `id_grupoUsuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_grupoUsuario_usuario` FOREIGN KEY (`grupoUsuario_id`) REFERENCES `grupousuario` (`id_grupoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
