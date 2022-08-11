-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Ago-2022 às 01:19
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `recibosec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `register` int(11) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `function` varchar(20) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `general_record` varchar(20) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `place_of_birth` varchar(50) DEFAULT NULL,
  `worksplace` varchar(50) DEFAULT NULL,
  `validity` varchar(20) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`id`, `name`, `register`, `position`, `function`, `image`, `general_record`, `cpf`, `marital_status`, `place_of_birth`, `worksplace`, `validity`, `users_id`) VALUES
(10, 'Stanley Jony', 100, 'Diácono', 'auxiliar', NULL, '1231231', '10457924462', 'Casado', 'CAMPINA GRANDE - PB', 'Campina Grande', '08-2024', 8),
(15, 'Jony', 112222, 'Pastor', '', NULL, '', '44444444444', 'Casado', 'CAMPINA GRANDE - PB', '', '08-2024', 8),
(16, 'Joao Da Costa', 100111, 'Diácono', 'Obreiro Auxiliar', 'd52358e2901d7065ed9635a22f7f712726720585da30cf390fc866e54bb92c197a20d148ea23543086633ae7705088d4dd9da8a3f34bef49d170e913.jpg', '1231231', '10855577744', 'Viúvo', 'Perdido - SP', 'Campina Grande', '08-2024', 8),
(17, 'Antonio da Carreira', 100112, 'Pastor', 'Obreiro Auxiliar', NULL, '1231231', '99988221111', 'Casado', 'CAMPINA GRANDE - PB', 'Campina Grande', '08-2024', 8),
(18, 'Antonio da Carreira 5', 100112, 'Pastor', 'Obreiro Auxiliar', '69d13cdbbb2f3d1864559ac706b356ec23d7f675eed8f3b41e85364d37dede17afba13bfe0b725e7238311600487f4c283e6331c3d73df56c9db78b1.jpg', '1231231', '99988221111', 'Casado', 'CAMPINA GRANDE - PB', 'Campina Grande', '08-2024', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `payer` varchar(100) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `emission` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `users_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `receipts`
--

INSERT INTO `receipts` (`id`, `payer`, `cpf`, `value`, `emission`, `description`, `users_id`) VALUES
(64, 'teste sacado4', '10457924462', '333.33', '2022-08-05', 'teste2', 8),
(66, 'teste sacado2', '12312312312', '3.33', '2022-08-06', '123erwr wer we ', 8),
(67, 'Melissa Isabel', '11111111111', '50.00', '2022-08-06', 'Comprou um bujão', 8),
(68, 'teste sacado10000', '12312312312', '34343.43', '2022-08-10', '', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `access_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `token`, `access_level`) VALUES
(8, 'stanley', '1jony2jony@gmail.com', '$2y$10$e3I8EVCo/azv0DO8XTbUKu113fkS7zeqOr44azbpst6SLqu2LACbW', NULL, '2b8a3e16cb880f438f43e657964a20f7bfedddd7577f6edab7afcde7c21122a07bfa6eda92fc989df4b1555182900abd9ba1', 'administrator');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Índices para tabela `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
