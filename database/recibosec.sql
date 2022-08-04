-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Ago-2022 às 21:39
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
(45, 'Joao da Silva', '12312312312', '4500.00', '2022-08-14', 'Pagamento Anuidade', 8),
(46, 'Pedro da Silva', '44564564564', '1200.00', '2022-08-28', 'comprou uma tv', 8),
(47, 'Antonio Silvino', '12312312312', '1200.00', '2022-08-03', 'Comprou um penico', 8),
(48, 'Joana Melo', '44564564569', '67.77', '2022-08-03', 'Compra de uma Geladeira', 8),
(49, 'teste sacado4', '10458745545', '5454.88', '2022-08-04', 'um teste qualquer', 8);

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
(8, 'stanley', 'admin@gmail.com', '$2y$10$e3I8EVCo/azv0DO8XTbUKu113fkS7zeqOr44azbpst6SLqu2LACbW', NULL, '2c13b74129910cfa9ccb3efb317765269be0d7b22d079f39d9d7f1fb1e805b97b5c4b01785b60cd2cdcc75a6f0d782804dce', 'administrator');

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
