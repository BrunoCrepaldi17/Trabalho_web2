-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Abr-2023 às 04:54
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `status` char(1) NOT NULL,
  `estado_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `email`, `telefone`, `endereco`, `numero`, `cidade`, `status`, `estado_id`) VALUES
(1, 'bruno crepaldi', '123.456.789-10', 'bruno@gmail.com', '98877-6655', 'Rua Guatemala ', 945, 'nova olimpia', 'N', NULL),
(2, 'joão pedro', '999.888.777-55', 'joao@outlook.com', '99988-1122', 'Rua Rio grande do sul', 22, 'Nova Olimpia', 'N', NULL),
(4, 'teste', '111111111', 'a@b.com', '999999999', 'rua A', 0, 'B', 'S', NULL),
(5, 'marcelo', '009.887-12', 'marcelo@gmail.com', '90908-1234', 'rua paraná', 99, 'cianorte', 'S', NULL),
(10, 'teste combobox', '1', 'teste@g.com', '1', 't', 1, 't', 'S', NULL),
(11, 'Bruno crepaldi', '123.456.789-10', 'brunocrepaldi.2009@gmail.com', '44997368851', 'Rua Guatemala ', 945, 'Nova olimpia', 'S', 2),
(12, 'eduardo crepaldi', '123.456.789-11', 'teste@teste.com', '12223435265', 'rua brasil', 10, 'Porto Alegre', 'S', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `nome`) VALUES
(2, 'Paraná - PR'),
(3, 'São Paulo - SP'),
(4, 'Rio de Janeiro - RJ'),
(5, 'Santa Catarina - SC'),
(6, 'Rio Grande do Sul - RS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupousuario`
--

CREATE TABLE `grupousuario` (
  `id_grupoUsuario` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(5) NOT NULL,
  `medida` int(100) NOT NULL,
  `categoriaproduto_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `sigla`, `medida`, `categoriaproduto_id`) VALUES
(8, 'Bucha da Bandeija', 'BBJ', 120, 1),
(9, 'Filtro de Óleo', 'filtr', 20, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `grupoUsuario_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `foto`, `sexo`, `email`, `senha`, `grupoUsuario_id`) VALUES
(42, 'teste cripto', NULL, 'O', 'teste@cripto.com', '$2y$10$LWERcxBlJnZFFWmCNvsVNODcfkC4zmItXkjrIlASIDPpopu0TFwlC', 2),
(43, 'bruno crepaldi', NULL, 'M', 'brunocrepaldi.2009@gmail.com', '$2y$10$37RSb7PE8xnu.ZuCJ7S.6.MNGXv91vCZCm34vtnJ6gzjjgRCnoWRC', 7),
(44, 'michele', NULL, 'F', 'michele@gmail.com', '$2y$10$HkKkmLfAqoaa9.bAvt19vuVO2tUemtr/Mc9lfZTt1dgsi6ICI0c9q', 6),
(45, 'web2', NULL, 'M', 'web2@teste.com', '$2y$10$SwUrEg916YsdrgeXgQDUY.3X.5Vb4wezFoqtHNvPIKwM9g8zrLIgS', 3),
(46, 'teste foto', '', 'F', 'foto@teste.com', '$2y$10$BF5lpXYPsi7lY6PUePTzQOCaMpfIziu0lFfRxltUM4H0wdhNCNgnG', 6),
(47, 'Marcelo Crepaldi', '', 'M', 'marcelo@gmail.com', '$2y$10$5mcULYVqHm7872eR9BOMXeyUbTQvMXYgqlKac1MnvRABmMskhWc/u', 6),
(49, 'foto', 'download.jpeg', 'O', 'foto@teste.com', '$2y$10$OqFoHcqaRmDxdgMb4fXwTeBtyaUb8S9Edp/A8nFgWMotKVQOMe5Uu', 2),
(50, 'Rosemeire dos Santos Crepaldi', 'download (1).jpeg', 'F', 'foto2@teste.com', '$2y$10$AzN2bDtfCJwWqeLDONaZ7.q2b8aCANuziiM.6pyEk.tjHRhzI3KAm', 6),
(51, 'login cad', 'foto.jpg', 'O', 'login@login.com', '$2y$10$5IFiRygLmLCJyjg8/A4O1uLL8D4XOcoqmTCZxUfK7hoqKrrB1KBzm', 7);

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
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_estado_cliente` (`estado_id`);

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
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_categoriaproduto_id` (`categoriaproduto_id`);

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
  MODIFY `id_cliente` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_produto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_estado_cliente` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_categoriaproduto_id` FOREIGN KEY (`categoriaproduto_id`) REFERENCES `categoriaproduto` (`id_categoriaproduto`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_grupoUsuario_usuario` FOREIGN KEY (`grupoUsuario_id`) REFERENCES `grupousuario` (`id_grupoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
