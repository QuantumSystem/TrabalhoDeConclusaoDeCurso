-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jun-2018 às 21:37
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quantumsystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle`
--

CREATE TABLE `controle` (
  `id` int(11) NOT NULL,
  `visitas_id` int(11) NOT NULL,
  `veiculos_id` int(11) NOT NULL,
  `residencias_id` int(11) NOT NULL,
  `entrada` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `saida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `controle`
--

INSERT INTO `controle` (`id`, `visitas_id`, `veiculos_id`, `residencias_id`, `entrada`, `saida`) VALUES
(4, 13, 33, 14, '2018-06-06 16:04:52', '2018-06-06 16:11:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `params` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `params`) VALUES
(1, 'Administradores', '1,2,8,12,13,14,16,17,19,21'),
(9, 'Usuarios', '1,19,20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_params`
--

CREATE TABLE `permission_params` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permission_params`
--

INSERT INTO `permission_params` (`id`, `name`) VALUES
(1, 'logout'),
(2, 'permissions_view'),
(8, 'users_view'),
(12, 'residencias_view'),
(13, 'moradores_view'),
(14, 'veiculos_view'),
(16, 'visitas_view'),
(17, 'controle_view'),
(19, 'relatorios_view'),
(21, 'entradas_view');

-- --------------------------------------------------------

--
-- Estrutura da tabela `residencias`
--

CREATE TABLE `residencias` (
  `id` int(11) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `residencias`
--

INSERT INTO `residencias` (`id`, `endereco`, `numero`) VALUES
(10, 'Rua Ipiranga', 1001),
(14, 'Rua Ipiranga', 1002),
(16, 'Rua Ipiranga', 1003);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `id_residencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `nome`, `password`, `telefone`, `celular`, `id_group`, `id_residencia`) VALUES
(1, 'admin@empresa123.com.br', 'Admin Principal', '202cb962ac59075b964b07152d234b70', '', '', 1, 14),
(16, 'teste@teste.com', 'Teste', '698dc19d489c4e4db73e28a713eab07b', '123456', '123456', 9, 16),

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `placa` varchar(11) NOT NULL,
  `cor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `modelo`, `placa`, `cor`) VALUES
(1, 'Nao possui veiculo!', 'xxx-xxx', ''),
(31, 'Corsa', 'abc-123', 'Preto'),
(32, 'S10', 'abc-321', 'Azul'),
(33, 'FOX', 'abc-231', 'Prata');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `idveiculo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `visitas`
--

INSERT INTO `visitas` (`id`, `idveiculo`, `nome`, `cpf`) VALUES
(12, 31, 'Maria', '3254258977'),
(13, 32, 'Joao', '5454545'),
(14, 32, 'Pedro', '8885555'),
(15, 1, 'Jose', '888555444'),
(16, 33, 'Marta', '5452121');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veiculos_id_fk` (`veiculos_id`),
  ADD KEY `visitas_id_idx` (`visitas_id`),
  ADD KEY `residencias_id_idx` (`residencias_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_params`
--
ALTER TABLE `permission_params`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residencias`
--
ALTER TABLE `residencias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_group_users` (`id_group`),
  ADD KEY `id_residencia_users_idx` (`id_residencia`);

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `id_veiculo_fk_idx` (`idveiculo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `controle`
--
ALTER TABLE `controle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permission_params`
--
ALTER TABLE `permission_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `residencias`
--
ALTER TABLE `residencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `residencias_id` FOREIGN KEY (`residencias_id`) REFERENCES `residencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `veiculos_id` FOREIGN KEY (`veiculos_id`) REFERENCES `veiculos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `visitas_id` FOREIGN KEY (`visitas_id`) REFERENCES `visitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_group_users` FOREIGN KEY (`id_group`) REFERENCES `permission_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_residencia_users` FOREIGN KEY (`id_residencia`) REFERENCES `residencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `id_veiculo_fk` FOREIGN KEY (`idveiculo`) REFERENCES `veiculos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
